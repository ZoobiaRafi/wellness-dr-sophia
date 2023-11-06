<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Appointment;
use App\Appointments_Sessions;
use App\BlockedDate;
use App\Blog;
use App\BlogCategory;
use App\Campaign;
use App\CartInfo;
use Illuminate\Http\Request;
use App\Category;
use App\ContentPage;
use App\CouponCode;
use App\Employee;
use App\Jobs\AppointmentEmailJob;
use App\Jobs\NewOrderEmailJob;
use App\LaserLocation;
use App\LaserSession;
use App\Models\User;
use App\Order;
use App\OrderProduct;
use App\Room;
use App\Test;
use App\Ticker;
use App\TrustedCompany;
use App\WellnessBlog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use \Milon\Barcode\DNS1D;


class FrontendController extends Controller
{
    public function generate_sessions(Request $request)
    {
        $session_id = $request->session()->get('session_id');
        if (!$session_id) {
            $session_id = Session::getId();
            $request->session()->put('session_id', $session_id);
        }
        $request->merge(['session_id' => $session_id]);
        return $session_id;
    }
    public function tickers()
    {
        return Ticker::where('status', 1)->orderBy('sort_order')->get();
    }
    public function content_links($location,)
    {
        return ContentPage::where('location', $location)->where('status', 1)->orderBy('sort_order')->get();
    }
    public function categories()
    {
        return Category::where('status', 1)->orderBy('sort_order')->get();
    }
    public function utmsources()
    {
        $utm_source = request()->query('utm_source');
        $utm_medium = request()->query('utm_medium');
        $utm_campaign = request()->query('utm_campaign');
        $utm_content = request()->query('utm_content');
        $utm_term = request()->query('utm_term');
        $parameters = [];
        if ($utm_source) {
            $parameters['utm_source'] = $utm_source;
        }
        if ($utm_medium) {
            $parameters['utm_medium'] = $utm_medium;
        }
        if ($utm_campaign) {
            $parameters['utm_campaign'] = $utm_campaign;
        }
        if ($utm_content) {
            $parameters['utm_content'] = $utm_content;
        }
        if ($utm_term) {
            $parameters['utm_term'] = $utm_term;
        }
        if (count($parameters) > 0) {
            return $url_with_parameters = '?' . http_build_query($parameters);
        } else {
            return '';
        }
    }
    public function laser_locations()
    {
        return LaserLocation::where('status', 1)->orderBy('sort_order')->get();
    }
    public function blog_categories()
    {
        return BlogCategory::where('status', 1)->orderBy('sort_order')->get();
    }
    public function best_sellers()
    {
        return Test::where('best_seller', 1)->where('status', 1)->orderBy('sort_order')->get();
    }
    public function featured_products()
    {
        return Test::with('category_detail')->where('featured', 1)->where('status', 1)->orderBy('best_seller', 'DESC')->orderBy('sort_order', 'ASC')->get();
    }
    public function trusted_companies()
    {
        return TrustedCompany::where('status', 1)->orderBy('sort_order')->get();
    }
    public function our_team()
    {
        return Employee::where('status', 1)->where('featured', 1)->orderBy('sort_order')->get();
    }
    public function cart_items(Request $request)
    {
        // $session_id = 0;
        $session_id = $this->generate_sessions($request);
        $UserID = 0;
        if (Auth()->check()) {
            $UserID =  Auth()->user()->id;
        }

        if ($UserID > 0) {
            $cartItems = \Cart::session($UserID)->getContent();
        } else {
            $cartItems = \Cart::session($session_id)->getContent();
        }
        return $cartItems;
    }
    public function blogs($ref = null, $id = null)
    {
        if ($ref != null) {
            if ($ref == "homepage") {
                return Blog::where('status', 1)->inRandomOrder()->orderBy('id', 'DESC')->take(3)->get();
            } else if ($ref == "category") {
                return Blog::category_blogs($id)->where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
            } else if ($ref == "product") {
                return Blog::product_blogs($id)->where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
            }
        } else {
            return Blog::where('status', 1)->get();
        }
    }
    public function marketing_campaign(Request $request)
    {
        // return $request;
        if ($request->get('utm_source')) {
            $NewCampaign = new Campaign();
            if ($request->get('utm_source') !== null && $request->get('utm_source') !== "" && $request->get('utm_source') !== "null") {
                $NewCampaign->utm_id = $request->get('utm_id');
                $NewCampaign->utm_source = $request->get('utm_source');
                $NewCampaign->utm_medium = $request->get('utm_medium');
                $NewCampaign->utm_campaign = $request->get('utm_campaign');
                $NewCampaign->utm_term = $request->get('utm_term');
                $NewCampaign->utm_content = $request->get('utm_content');
                $NewCampaign->ref_link = $request->path();
                $NewCampaign->ip_address = $request->ip();
                $NewCampaign->user_agent = $request->header('User-Agent');
                $NewCampaign->save();
            }
        }
    }


    public function services()
    {
        //35 is the id of category Dr Sophia
        return Category::where('parent_category', 35)->get();
    }
    public function currentService($slug)
    {
        return Category::where('slug', $slug)->where('status', 1)->first();
    }
    public function currentServiceTreatments($id)
    {
        return Test::where('category', $id)->where('status', 1)->get();
    }
    public function servicesExcludeCurrent($id)
    {
        return Category::where('parent_category', 35)->where('id', '<>', $id)->get();
    }
    public function currentTreatment($slug)
    {
        return Test::where('slug', $slug)->where('status', 1)->first();
    }
    public function currentBlog($slug)
    {
        return WellnessBlog::where('slug', $slug)->where('status', 1)->first();
    }
    public function index(Request $request)
    {
        $view = 'index';
        $services = $this->services();
        $utm = $this->utmsources();
        $cart_items = $this->cart_items($request);

        return view($view, compact('services', 'cart_items', 'utm'));
    }
    public function gallery(Request $request)
    {
        $view = 'beauty-gallery';
        $services = $this->services();
        $cart_items = $this->cart_items($request);
        $utm = $this->utmsources();


        return view($view, compact('services', 'cart_items', 'utm'));
    }
    public function blogListing(Request $request)
    {
        $view = 'blog-listing';
        $services = $this->services();
        $utm = $this->utmsources();
        $cart_items = $this->cart_items($request);
        $blogs = WellnessBlog::where('status', 1)->get();


        return view($view, compact('services', 'cart_items', 'utm', 'blogs'));
    }
    public function blogDetail(Request $request, $slug)
    {
        $view = 'blog-detail';
        $services = $this->services();
        $cart_items = $this->cart_items($request);
        $utm = $this->utmsources();
        $blogs = WellnessBlog::where('status', 1)->get();
        $thisBlog = $this->currentBlog($slug);

        return view($view, compact('services', 'cart_items', 'utm', 'thisBlog', 'blogs'));
    }
    public function gp(Request $request)
    {
        $view = 'gp-consultation';
        $services = $this->services();
        $utm = $this->utmsources();
        $cart_items = $this->cart_items($request);

        return view($view, compact('services', 'cart_items', 'utm'));
    }
    public function terms(Request $request)
    {
        $view = 'terms';
        $services = $this->services();
        $cart_items = $this->cart_items($request);
        $utm = $this->utmsources();

        return view($view, compact('services', 'cart_items', 'utm'));
    }
    public function treatments($slug, Request $request)
    {
        $thisService = $this->currentService($slug);
        $treatments = $this->currentServiceTreatments($thisService->id);
        $services = $this->services();
        $servExcludeCurrent = $this->servicesExcludeCurrent($thisService->id);
        $cart_items = $this->cart_items($request);
        $utm = $this->utmsources();

        $view = 'services';

        return view($view, compact('services', 'thisService', 'treatments', 'servExcludeCurrent', 'cart_items', 'utm'));
    }
    public function treatmentService($slug, Request $request)
    {
        $thisTreatment = $this->currentTreatment($slug);
        $treatments = $this->currentServiceTreatments($thisTreatment->id);
        $services = $this->services();
        $servExcludeCurrent = $this->servicesExcludeCurrent($thisTreatment->id);
        $cart_items = $this->cart_items($request);
        $utm = $this->utmsources();

        $view = 'treatment-service';

        return view($view, compact('services', 'thisTreatment', 'treatments', 'servExcludeCurrent', 'cart_items', 'utm'));
    }
    public function gpConsultation_submit(Request $request){
        $User = User::where('email',$request->email)->first();
        if(!isset($User)){
            $User = new User();
            $User->name = $request->first_name . " " . $request->last_name;
            $User->email = $request->email;
            $User->contact_no = $request->contactno;
            $User->role_id = 2;
            $User->password = bcrypt($request->password);
            $User->status = 1;
            $User->save();
        }
        $Test = Test::find(64);
        $Order = new Order;
        $Order->customer_id = $User->id;
        $Order->full_name = $request->first_name . " " . $request->last_name;
        $Order->email = $request->email;
        $Order->contact_no = $request->contactno;
        $Order->order_total = $Test->price;
        $Order->appointment = 1;
        $Order->address = "Aa Business Centre, 326-340, Dunstable Rd, Maidenhall, Luton LU4 8JS, United Kingdom";
        $Order->status = 1;
        $Order->referrer = $request->refer;
        $Order->payment_gateway = "In Clinic";
        $Order->takepayment_status = "Pending";
        if($request->utm_source != null ||  $request->utm_medium != null || $request->utm_campaign != null || $request->utm_term != null ){
            $Order->campaign_sources = $request->utm_source . ',' . $request->utm_medium . ',' . $request->utm_campaign . ',' . $request->utm_term; 
        } 
        $Order->save();
        $OrderPro = new OrderProduct;
        $OrderPro->test_id = 64;
        $OrderPro->order_id = $Order->id;
        $OrderPro->quantity = 1;
        $OrderPro->price = $Test->price;
        $OrderPro->total = $Test->price;
        $OrderPro->booking_time = $request->bookingstarttime . "-" . $request->bookingendtime;
        $OrderPro->booking_date = $request->bookingdate;
        $OrderPro->booking_start_time = $request->bookingstarttime;
        $OrderPro->booking_end_time = $request->bookingendtime;
        $OrderPro->booking_date_time = $request->bookingdate . "-" . $request->bookingtime;
        $OrderPro->save();

        $NewApp = new Appointment;
        $NewApp->subject = "GP Consultation";
        $NewApp->name = $request->first_name . " " . $request->last_name;
        $NewApp->email = $request->email;
        $NewApp->phone = $request->contactno;
        $NewApp->order_id = $Order->id;
        $NewApp->test_id = 64;
        $NewApp->status = 1;
        $NewApp->gender_preference = $request->preference;
        $NewApp->appointment_date = date('Y-m-d',strtotime($request->bookingdate));
        $NewApp->appointment_start_time = $request->bookingstarttime; 
        $NewApp->appointment_end_time = $request->bookingendtime;
        $NewApp->appointment_time = $request->bookingstarttime . "-" .$request->bookingendtime;
        $NewApp->save();

        if($request->id == 0){
            if (setting('take-payment.status') == "1") {
                return response()->json([
                    "status" => "success",
                    "redirect" => 'checkout/payment-proceed/' . $Order->id . '?is_booking=0',
                    "message" => "Please wait. We are processing your order",
                ]);
            }
        }
        else{
            dispatch(new NewOrderEmailJob($Order->id, $request->email, "customer"));
            $NotificationEmails = explode(",",env("NOTIFICATION_EMAILS"));
            foreach($NotificationEmails as $NE) {
                dispatch(new NewOrderEmailJob($Order->id, $NE, "admin"));
            }
            return response()->json([
                "status" => "success",
                "redirect" => 'checkout/success?is_booking=' . $request->id . '&no=' . $Order->id,
                "message" => "Please wait we are proccessing your order",
            ]);
        }
    }
    public function check_avalibilty(Request $request)
    {
        if ($request->date) {
            $flag = 0;
            $testinfo = Test::find($request->get('product_id'));
            if (!empty($testinfo->app_days)) {
                $timestamp_date = strtotime($request->date);
                $dayofweek = strtolower(date('l', $timestamp_date));
                $appointmentdays = explode(',', $testinfo->app_days);
                foreach ($appointmentdays as $days) {
                    if ($days == $dayofweek) {
                        $flag++;
                    }
                }
                $flag;
                if ($flag == 0) {
                    return response()->json([
                        'message' => 'Sorry there is no available appointments.',
                        'status' => "422",
                    ]);
                }
            }

            if ($testinfo->appointment_perday != "" || $testinfo->appointment_perday != null) {
                $appointmentperday = Appointment::where('test_id', $request->get('product_id'))->where('appointment_date', date('Y-m-d', strtotime($request->date)))->count();
                if ($appointmentperday >= $testinfo->appointment_perday) {
                    return response()->json([
                        'message' => 'Apologies, fully booked. Explore another day for your optimized experience.',
                        'status' => "422"
                    ]);
                }
            }

            // return $testinfo->category . "-" . $testinfo->gender; 
            if ($testinfo->category == 1 || $testinfo->category == 2 || $testinfo->category == 4 || $testinfo->category == 7 || $testinfo->category == 8 || $testinfo->category == 10) {
                $timestamp_date = strtotime($request->date);
                $date = date('d-m-Y', $timestamp_date);

                // Don't show timings on weekends (Saturday and Sunday)
                $dayOfWeek = date('w', $timestamp_date);
                if ($dayOfWeek == 0 || $dayOfWeek == 6) {
                    return response()->json([
                        'message' => 'Sorry there is no available appointments.',
                        'status' => "422"
                    ]);
                }
            }

            if ($testinfo->category == 1) {
                $timestamp_date = strtotime($request->date);
                $date = date('d-m-Y', $timestamp_date);

                // Don't show timings on weekends (Saturday and Sunday)
                $dayOfWeek = date('w', $timestamp_date);
                if ($dayOfWeek == 6) {
                    return response()->json([
                        'message' => 'Sorry there is no available appointments.',
                        'status' => "422"
                    ]);
                }
            }

            if ($testinfo->category == 5) { //&& $testinfo->gender == 2){
                $timestamp_date = strtotime($request->date);
                $date = date('d-m-Y', $timestamp_date);

                // Don't show timings on weekends (Saturday and Sunday)
                $dayOfWeek = date('w', $timestamp_date);
                if ($dayOfWeek == 0) {
                    return response()->json([
                        'message' => 'Sorry there is no available appointments.',
                        'status' => "422"
                    ]);
                }
            }
            if ($testinfo->category != 9) {
                if ($request->date == '05-06-2023') {
                    return response()->json([
                        'message' => 'Sorry we are fully booked.',
                        'status' => "422"
                    ]);
                }
            }
            $checkblockdate = date('Y-m-d', strtotime($request->date));
            $BlockedDate = BlockedDate::whereDate('block_date', $checkblockdate)->first();

            if (isset($BlockedDate->id)) {
                return response()->json([
                    'message' => $BlockedDate->website_msg,
                    'status' => "422"
                ]);
            }


            $timestamp_date = strtotime($request->date);
            $date = date('Y-m-d', $timestamp_date);
            if ($request->get('product_id') != "" && $request->get('product_id') > 0) {
                $product_detail = Test::findorfail($request->get('product_id'));
                $appointment_limit = $product_detail->appointment_limit;
                if ($request->sessionid != "") {
                    $lasersession = LaserSession::find($request->sessionid);
                    if ($lasersession->hours != null || $lasersession->minutes) {
                        $hours = $lasersession->hours;
                        $pro_minutes = $lasersession->minutes;
                    } else {
                        $hours = $product_detail->hours;
                        $pro_minutes = $product_detail->minutes;
                    }
                } else {
                    $hours = $product_detail->hours;
                    $pro_minutes = $product_detail->minutes;
                }
            } else {
                $appointment_limit = 5;
                $hours = 0;
                $pro_minutes = 10;
            }
            if ($hours != null && $hours != "" && $hours > 0) {

                $hoursmins = ($hours * 60);
                if ($pro_minutes != null && $pro_minutes != "" && $pro_minutes > 0) {
                    $pro_minutes = $pro_minutes + $hoursmins;
                } else {
                    $pro_minutes = $hoursmins;
                }
            }
            $currentDate = Carbon::now();
            if ($request->date == $currentDate) {
                $start_time = strtotime(setting('appointments.starting_time')) + 3 * 60 * 60;
            } else {
                $start_time = strtotime(setting('appointments.starting_time'));
            }
            $end_time = strtotime(setting('appointments.end_time'));

            $day = strtolower(date('l', strtotime(request()->get('date'))));
            if ($day == "sunday") {
                $start_time = strtotime(setting('appointments.starting_time_sunday'));
                $end_time = strtotime(setting('appointments.end_time_sunday'));
            }
            $break_time_start = strtotime(request()->get('date'));
            $break_time_end = strtotime(request()->get('date'));
            if ($day != "sunday") {
                $break_time_start = strtotime(setting('appointments.break_start'));
                $break_time_end = strtotime(setting('appointments.break_end'));
            }
            $seconds = 60;
            $slot_gap = setting('appointments.slots_gap');
            // $count = 0;
            $minutes = $slot_gap * $seconds;
            $timings = array();
            $count = 0;
            $current_time = Carbon::now();
            // $start_time = strtotime($current_time->addHours(3));
            $appointments = Appointment::get();
            // dd( $appointments);
            $today_hours = Carbon::now()->addHours(1);
            $product_appointments = array();
            $roomid = 0;
            foreach ($product_detail->rooms as $rooms) {
                $roomid = $rooms->room_id;
            }

            // check_booking__orders
            if ($request->get('product_id') != "" && $request->get('product_id') > 0) {
                $appointments = Appointment::where('appointment_date', $date)
                    ->where(function ($q) use ($request) {
                        $q->where('appointment_status_id', '!=', 6)->whereNull('deleted_at');
                    })
                    ->get();

                // dd($date);
                // foreach ($product_detail->appointments->where('appointment_date', $date) as $order_product) { 
                foreach ($appointments as $order_product) {
                    if ($order_product->appointment_time != null) {
                        $product_appointments[] = array(
                            'time' => $order_product->appointment_time,
                            'start' => $order_product->appointment_start_time,
                            'end' => $order_product->appointment_end_time,
                        );
                    }
                }
            }

            if (isset($product_detail->app_time_from) && isset($product_detail->app_time_to)) {
                if ($request->date == $currentDate) {
                    $start_time = strtotime($product_detail->app_time_from + 3 * 60 * 60);
                } else {
                    $start_time = strtotime($product_detail->app_time_from);
                }
                $end_time = strtotime($product_detail->app_time_to);
            }

            for ($i = $start_time; $i < $end_time; $i += $pro_minutes * $seconds) {
                // return $count;
                if (date("H:i", $i + $minutes * $count) < date("H:i", $break_time_start) || date("H:i", $i + $minutes * $count) >= date("H:i", $break_time_end)) {
                    $appointment_time = date("H:i", $i + $minutes * $count) . ' - ' . date("H:i", $i + $pro_minutes * $seconds + $minutes * $count);
                    $available_apponintment_bookings = Appointment::where('appointment_date', $request->date)->where('appointment_time', $appointment_time)->where('room_id', $roomid)->get();  //appopiintment held in this date
                    $count_apponintment_bookings = Appointment::where('appointment_date', $request->date)
                        ->where('appointment_time', $appointment_time)
                        ->where('room_id', $roomid)->count();  //available_services in this room at this date

                    if ($date == date('Y-m-d')) {
                        if (date("H:i", $i + $minutes * $count) >= $today_hours->format('H:i')) {
                            if (date("H:i", $i + $pro_minutes * $seconds + $minutes * $count) < date("H:i", $end_time)) {
                                $timings[] = array(
                                    'time' => date("H:i", $i + $minutes * $count) . ' - ' . date("H:i", $i + $pro_minutes * $seconds + $minutes * $count),
                                    'start' => date("H:i", $i + $minutes * $count),
                                    'end' => date("H:i", $i + $pro_minutes * $seconds + $minutes * $count),
                                    'status' => true,
                                    'available_apponintment_bookings' => $available_apponintment_bookings,
                                    'count_apponintment_bookings' => $count_apponintment_bookings,
                                );
                            }
                        }
                    } else {

                        if (date("H:i", $i + $pro_minutes * $seconds + $minutes * $count) < date("H:i", $end_time)) {
                            $timings[] = array(
                                'time' => date("H:i", $i + $minutes * $count) . ' - ' . date("H:i", $i + $pro_minutes * $seconds + $minutes * $count),
                                'start' => date("H:i", $i + $minutes * $count),
                                'end' => date("H:i", $i + $pro_minutes * $seconds + $minutes * $count),
                                'status' => true,
                                'available_apponintment_bookings' => $available_apponintment_bookings,
                                'count_apponintment_bookings' => $count_apponintment_bookings,
                            );
                        }
                    }
                }
            }

            return response()->json([
                "appointment_limit" => $appointment_limit,
                "test_id" => $request->get('product_id'),
                "status" => "allow",
                "office_start_time" => setting('appointments.starting_time'),
                "office_end_time" => setting('appointments.end_time'),
                "break_time_start" => setting('appointments.break_start'),
                "break_time_end" => setting('appointments.break_end'),
                "current_timing" => $current_time->format('H:i'),
                "today_hours" => $today_hours,
                "date" => $date,
                "user_date" => date("d M, Y", strtotime($date)),
                "slot_gap" => $slot_gap,
                "product_appointments" => $product_appointments,
                "timings" => $timings,
            ]);
        }
        // }
        else {
            return response()->json([
                "status" =>  'invalid',
                "message" =>  'error message',
                "date" => date('Y-m-d')
            ]);
        }
    }
    public function addToCart($id, Request $request)
    {
        $utm = $this->utmsources();
        $UserID = 0;
        if (Auth()->check()) {
            $UserID =  Auth()->user()->id;
        }

        $TestInfo = Test::find($id);
        // $session_id = $request->session()->get('session_id');
        $session_id = $this->generate_sessions($request);
        if (!$session_id) {
            // Generate a new session ID and store it in the session
            $session_id = time() . Str::random(10);
            $request->session()->put('session_id', $session_id);
        }
        // Check if the user has a cart ID stored in their cookie
        $ProPrice = $TestInfo->price;
        $DiscountInfo = array();

        if ($TestInfo->discount_type > 0) {
            $DiscountType = $TestInfo->discount_type;
            $DiscountValue = $TestInfo->discount_value;
            $DiscountExpiry = date("Y-m-d", strtotime($TestInfo->discount_expiry));
            $DiscountAmount = 0;


            if ($DiscountType == "1") {  //Flat Discount
                $DiscountAmount = $TestInfo->discount_value;
            } else { //Percentage Discount
                $ProPrice = $TestInfo->price;
                $DiscountAmount = ($ProPrice / 100) * $DiscountValue;
            }
            if (date("Y-m-d") >= $DiscountExpiry) {
                $ProPrice = $ProPrice - $DiscountAmount;
            }
        }

        if ($UserID > 0) {
            \Cart::session($UserID)->add([
                'id' => $id,
                'name' => $TestInfo->title,
                'price' => $ProPrice,
                'quantity' => 1,
                'image' => $TestInfo->cart_image,
                'attributes' => array(
                    "direct_order" => 1,
                    "type" => (!empty(request()->get('v'))) ? request()->get('v') : 0,
                ),
                'associatedModel' => $TestInfo
            ]);
        } else {
            \Cart::session($session_id)->add([
                'id' => $id,
                'name' => $TestInfo->title,
                'price' => $TestInfo->price,
                'quantity' => 1,
                'image' => $TestInfo->cart_image,
                'attributes' => array(
                    "direct_order" => 1,
                    "type" => (!empty(request()->get('v'))) ? request()->get('v') : 0,
                ),
                'associatedModel' => $TestInfo
            ]);
        }

        if (isset($_REQUEST['request_type'])) {
            if ($_REQUEST['request_type'] == 'ajax') {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Request added successfully'
                ]);
            }
        }

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect('/my-cart' . $utm);
        return redirect()->route('cart.list');
    }
    public function cart_product(Request $request)
    {
        $view = 'checkout';
        $test = Test::where('ref_key', $request->key)->first();
        $tickers = $this->tickers();
        $utm = $this->utmsources();
        $header_links = $this->content_links('1');
        $footer_links = $this->content_links('2');
        $categories = $this->categories();
        $blogcategories = $this->blog_categories();
        $laser_location = $this->laser_locations();
        $featured = $this->featured_products();
        $trustedcompanies = $this->trusted_companies();
        $teams = $this->our_team();
        $cart_items = $this->cart_items($request);
        $services = $this->services();
        $blogs = $this->blogs("homepage");
        $this->marketing_campaign($request);
        return view($view, compact(
            'tickers',
            'utm',
            'categories',
            'featured',
            'trustedcompanies',
            'teams',
            'header_links',
            'footer_links',
            'cart_items',
            'blogs',
            'laser_location',
            'blogcategories',
            'test',
            'services'
        ));
    }
    public function my_cart(Request $request)
    {
        // $session_id = $request->session()->get('session_id');
        $session_id = $this->generate_sessions($request);

        $UserID = 0;
        if (Auth()->check()) {
            $UserID =  Auth()->user()->id;
        }
        if ($UserID > 0) {
            $cartItems = \Cart::session($UserID)->getContent();
            foreach ($cartItems as $key => $value) {
                // return $value[$key]->id;
            }
        } else {
            $cartItems = \Cart::session($session_id)->getContent();
        }

        $tickers = $this->tickers();
        $utm = $this->utmsources();
        $header_links = $this->content_links('1');
        $footer_links = $this->content_links('2');
        $categories = $this->categories();
        $blogcategories = $this->blog_categories();
        $laser_location = $this->laser_locations();
        $services = $this->services();

        $subTotal = \Cart::getSubTotal();
        $cart_items = $this->cart_items($request);
        $this->marketing_campaign($request);
        return view('checkout', compact(
            'tickers',
            'utm',
            'categories',
            'cartItems',
            'subTotal',
            'header_links',
            'cart_items',
            'footer_links',
            'laser_location',
            'services',
            'blogcategories',
        ));
    }
    public function remove_cart(Request $request, $id)
    {
        // $session_id = $request->session()->get('session_id');
        $session_id = $this->generate_sessions($request);

        $UserID = 0;
        if (Auth()->check()) {
            $UserID =  Auth()->user()->id;
        }

        $TestInfo = Test::find($id);

        if ($UserID > 0) {
            \Cart::session($UserID)->remove($id);
            $cartItems = \Cart::session($UserID)->getContent();
        } else {
            \Cart::session($session_id)->remove($id);
            $cartItems = \Cart::session($session_id)->getContent();
        }

        $CartTotal = count($cartItems);
        foreach ($cartItems as $ci) {
            if ($ci == "64") {
                if ($UserID > 0) {
                    \Cart::session($UserID)->clear();
                } else {
                    \Cart::clear();
                }
            }
        }

        session()->flash('info', $TestInfo->title . ' Successfully removed for your cart.');

        return redirect()->back();
    }
    public function in_clinic_submit(Request $request)
    {
        // return $request;
        // $session_id = $request->session()->get('session_id');
        $session_id = $this->generate_sessions($request);

        if (Auth::check()) {
            $UserID = Auth()->user()->id;
        }
        if (!Auth::check()) {
            $user = new User();
            $user->name = $request->firstname . " " . $request->lastname;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->dob;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->contact_no = $request->contact;
            $user->save();
            $UserID = $user->id;
        }
        if (Auth::check()) {
            $cartItems = \Cart::session($UserID)->getContent();
        } else {
            $cartItems = \Cart::session($session_id)->getContent();
        }
        $OrderRefKey = Str::random(50);
        // $session_id = $request->session()->get('session_id');
        $Order = new Order;
        if (Auth::check()) {
            $Order->customer_id = Auth()->user()->id;
        } else {
            $Order->customer_id = $user->id;
        }
        $Order->first_name = $request->firstname;
        $Order->last_name = $request->last_name;
        if (Auth::check()) {
            $Order->full_name = Auth()->user()->name;
        } else {
            $Order->full_name = $user->name;
        }
        $Order->email = $request->email;
        $Order->contact_no = $request->contactno;
        $Order->gender = $request->gender;
        // $Order->ethnicity_parent_id = $user->ethnicity;
        $Order->order_total = $request->grandtotal;
        $Order->appointment = 1;
        $Order->address = "Aa Business Centre, 326-340, Dunstable Rd, Maidenhall, Luton LU4 8JS, United Kingdom";
        $Order->status = 1;
        $Order->ref_key = $OrderRefKey;
        $Order->referrer = $request->refer;
        if ($request->couponentered == 1) {
            if (isset($request->code)) {
                $Order->coupon_code = $request->code;
                $couponcode = CouponCode::where('code', $request->code)->first();
                $Order->coupon_type = $couponcode->coupon_type;
                $Order->coupon_value = $couponcode->discountvalue;
            }
        }
        if (setting('take-payment.status') == "1") {
            $Order->payment_gateway = "Take Payment";
            $Order->takepayment_status = "Pending";
        }
        if ($request->utm_source != null ||  $request->utm_medium != null || $request->utm_campaign != null || $request->utm_term != null) {
            $Order->campaign_sources = $request->utm_source . ',' . $request->utm_medium . ',' . $request->utm_campaign . ',' . $request->utm_term;
        }
        $Order->save();
        foreach ($cartItems as $ci) {
            $OrderPro = new OrderProduct;
            $OrderPro->test_id = $ci->associatedModel->id;
            $OrderPro->order_id = $Order->id;
            $OrderPro->quantity = 1;
            $OrderPro->price = $ci->price;
            $Test = Test::find($ci->associatedModel->id);
            if ($Test->category == 5 || (isset($Test->category_detail->parent_category_detail) && $Test->category_detail->parent_category_detail == 12)) {
                //For Laser Only
                $Quantity = $request->session;
                $replacement = "";
                $OrderPro->quantity = str_replace('x', $replacement, $Quantity);
                $OrderPro->session = str_replace('x', $replacement, $Quantity);
            } else {
                $OrderPro->quantity = $ci->quantity;
            }

            if ($Test->category == 10 || $Test->id == 116) {
                $OrderPro->quantity = $ci->quantity;
                $OrderPro->session = $ci->quantity;
                if ($request->package_id != "") {
                    $OrderPro->package = $request->package_id;
                } else {
                    $OrderPro->package = 8;
                }
            }

            $OrderPro->total = $request->grandtotal;
            $OrderPro->booking_time = $request->bookingtime;
            $OrderPro->booking_date = date('Y-m-d', strtotime($request->bookingdate));
            $OrderPro->booking_start_time = $request->bookingstarttime;
            $OrderPro->booking_end_time = $request->bookingendtime;
            $OrderPro->save();

            if ($Test->category == 9) {
                $cartinfo = new CartInfo();
                $cartinfo->order_id = $Order->id;
                $cartinfo->order_product_id = $OrderPro->id;
                $cartinfo->booking_date = date('Y-m-d', strtotime($request->bookingdate));
                $cartinfo->booking_time = $request->bookingtime;
                $cartinfo->booking_start_time = $request->bookingstarttime;
                $cartinfo->booking_end_time = $request->bookingendtime;
                $cartinfo->first_name = $request->firstname;
                $cartinfo->last_name = $request->lastname;
                $cartinfo->email = $request->email;
                $cartinfo->phone = $request->contact;
                $cartinfo->gender = $request->gender;
                $cartinfo->dob = $request->dob;
                $cartinfo->save();
                $Order->covid = 1;
                $Order->save();
            }

            $App = new Appointment();
            $App->name = $request->firstname . " " . $request->lastname;
            $App->email = $request->email;
            $App->phone = $request->contact;
            $App->appointment_date = date('Y-m-d', strtotime($request->bookingdate));
            $App->appointment_start_time = $request->bookingstarttime;
            $App->appointment_end_time = $request->bookingendtime;
            $App->appointment_time = $request->bookingtime;
            $App->subject = $Test->title;
            $App->order_id = $Order->id;
            $App->test_id = $ci->associatedModel->id;
            $data = $Order->id . '-' . $OrderPro->id;
            $barcode = DNS1D::getBarcodePNG($data, 'C39', 1, 33, array(0, 0, 0), true);
            $barcodedata = base64_decode($barcode);
            $QRPath  = "customers/orders/bar-codes/" . $Order->id . '-' . $OrderPro->id . ".png";
            file_put_contents($QRPath, $barcodedata);
            $App->sample_barcode_img = $QRPath;
            $App->sample_barcode = 1;
            $App->save();

            if ($Test->category == 5 || (isset($Test->category_detail->parent_category_detail) && $Test->category_detail->parent_category_detail == 12)) {
                for ($x = 0; $x < $OrderPro->quantity; $x++) {
                    $Appsession = new Appointments_Sessions();
                    $Appsession->appointment_id = $App->id;
                    $Appsession->status = 0;
                    $Appsession->price = $ci->price;
                    if ($x == 0) {
                        $Appsession->appointment_date = date('Y-m-d', strtotime($request->bookingdate));
                        $Appsession->appointment_time = $request->bookingstarttime . '-' . $request->bookingendtime;
                    }
                    if ($request->isbooking == 0) {
                        $Appsession->payment_collect = "1";
                    } else {
                        $Appsession->payment_collect = "0";
                    }
                    $Appsession->save();
                }
            }
        }
        \Cart::clear();
        \Cart::session($UserID)->clear();
        \Cart::session($session_id)->clear();
        $request->session()->forget('session_id');
        Auth::logout();
        $IsBooking = $request->isbooking;
        if (setting('take-payment.status') == "1") {
            if ($IsBooking == 0) {
                return response()->json([
                    "status" => "success",
                    "redirect" => '/checkout/payment-proceed/' . $Order->id . '?is_booking=' . $IsBooking,
                    "message" => "Please wait. We are processing your order",
                ]);
            } else {
                dispatch(new NewOrderEmailJob($Order->id, $request->email, "customer"));
                $NotificationEmails = explode(",", env("NOTIFICATION_EMAILS"));
                foreach ($NotificationEmails as $NE) {
                    dispatch(new NewOrderEmailJob($Order->id, $NE, "admin"));
                }
                dispatch(new AppointmentEmailJob($Order->id, $request->email));
                $this->SendAppointmentEmail($Order->id, $request->email);
                return response()->json([
                    "status" => "success",
                    "redirect" => 'checkout/success?is_booking=' . $IsBooking . '&no=' . $Order->id,
                    "message" => "Your Order placed successfully",
                ]);
                // return redirect('checkout/success?is_booking=' . $IsBooking)->with('success', 'Your order placed successfully');
            }
        }
    }
    public function in_clinic_login_submit(Request $request)
    {
        $session_id = $this->generate_sessions($request);
        $user = User::where('email', $request->email)->first();
        $UserID = $user->id;
        $OrderRefKey = Str::random(50);
        $cartItems = $this->cart_items($request);
        // dd($cartItems);
        $Order = new Order;
        $Order->customer_id = $user->id;
        $Order->first_name = $user->firstname;
        $Order->last_name = $user->last_name;
        $Order->full_name = $user->name;
        $Order->email = $user->email;
        $Order->contact_no = $user->contactno;
        $Order->gender = $user->gender;
        $Order->order_total = $request->grandtotal;
        $Order->address = "Aa Business Centre, 326-340, Dunstable Rd, Maidenhall, Luton LU4 8JS, United Kingdom";
        $Order->appointment = 1;
        $Order->status = 1;
        $Order->ref_key = $OrderRefKey;
        $Order->referrer = $request->refer;
        if ($request->couponentered == 1) {
            if (isset($request->code)) {
                $Order->coupon_code = $request->code;
                $couponcode = CouponCode::where('code', $request->code)->first();
                $Order->coupon_type = $couponcode->coupon_type;
                $Order->coupon_value = $couponcode->discountvalue;
            }
        }
        // $Order->campaign_sources = $utm;

        // if(setting('payment-gateway.status') == "1")  {
        //     $Order->payment_gateway = "Stripe";
        // }
        // if($request->direct_order == "1") {
        //     $Order->payment_gateway = "Square";
        // }
        if (setting('take-payment.status') == "1") {
            $Order->payment_gateway = "Take Payment";
            $Order->takepayment_status = "Pending";
        }
        if ($request->utm_source != null ||  $request->utm_medium != null || $request->utm_campaign != null || $request->utm_term != null) {
            $Order->campaign_sources = $request->utm_source . ',' . $request->utm_medium . ',' . $request->utm_campaign . ',' . $request->utm_term;
        }
        $Order->save();
        foreach ($cartItems as $ci) {
            $OrderPro = new OrderProduct;
            $OrderPro->test_id = $ci->associatedModel->id;
            $OrderPro->order_id = $Order->id;
            $OrderPro->quantity = 1;
            $OrderPro->price = $ci->price;
            $Test = Test::find($ci->associatedModel->id);
            // if($Test->category == 5 || $Test->category_detail->parent_category_detail->id == 12){ 

            if ($Test->category == 5 || (isset($Test->category_detail->parent_category_detail) && $Test->category_detail->parent_category_detail->id == 12)) {
                //For Laser Only
                $Quantity = $request->session;
                $replacement = "";
                $OrderPro->quantity = str_replace('x', $replacement, $Quantity);
                $OrderPro->session = str_replace('x', $replacement, $Quantity);
            } else {
                $OrderPro->quantity = $ci->quantity;
                $OrderPro->session = $ci->quantity;
            }

            if ($Test->category == 10 || $Test->id == 116) {
                if ($request->package_id != "") {
                    $OrderPro->package = $request->package_id;
                } else {
                    $OrderPro->package = 8;
                }
                $OrderPro->quantity = $ci->quantity;
                $OrderPro->session = $ci->quantity;
            }
            // $OrderPro->test_price = $ci->price;
            $OrderPro->total = $request->grandtotal;
            $OrderPro->booking_time = $request->bookingtime;
            $OrderPro->booking_date = date('Y-m-d', strtotime($request->bookingdate));
            $OrderPro->booking_start_time = $request->bookingstarttime;
            $OrderPro->booking_end_time = $request->bookingendtime;
            $OrderPro->save();

            if ($Test->category == 9) {
                $cartinfo = new CartInfo();
                $cartinfo->order_id = $Order->id;
                $cartinfo->order_product_id = $OrderPro->id;
                $cartinfo->booking_date = date('Y-m-d', strtotime($request->bookingdate));
                $cartinfo->booking_time = $request->bookingtime;
                $cartinfo->booking_start_time = $request->bookingstarttime;
                $cartinfo->booking_end_time = $request->bookingendtime;
                $cartinfo->first_name = $user->name;
                // $cartinfo->last_name = $user->lastname;
                $cartinfo->email = $user->email;
                $cartinfo->phone = $user->contact_no;
                $cartinfo->gender = $user->gender;
                $cartinfo->dob = $user->date_of_birth;
                // $cartinfo->address = $request->address;
                $cartinfo->save();
                $Order->covid = 1;
                $Order->save();
            }

            $App = new Appointment();
            $App->name = $user->firstname . " " . $user->lastname;
            $App->email = $user->email;
            $App->phone = $user->contact;
            $App->appointment_date = date('Y-m-d', strtotime($request->bookingdate));
            $App->appointment_start_time = $request->bookingstarttime;
            $App->appointment_end_time = $request->bookingendtime;
            $App->appointment_time = $request->bookingtime;
            $App->subject = $Test->title;
            $App->order_id = $Order->id;
            $App->test_id = $ci->associatedModel->id;
            $data = $Order->id . '-' . $OrderPro->id;
            $barcode = DNS1D::getBarcodePNG($data, 'C39', 1, 33, array(0, 0, 0), true);
            $barcodedata = base64_decode($barcode);
            $QRPath  = "customers/orders/bar-codes/" . $Order->id . '-' . $OrderPro->id . ".png";
            file_put_contents($QRPath, $barcodedata);
            $App->sample_barcode_img = $QRPath;
            $App->sample_barcode = 1;
            $App->save();

            // if($Test->category == 5 || $Test->category_detail->parent_category_detail->id == 12){

            if ($Test->category == 5 || (isset($Test->category_detail->parent_category_detail) && $Test->category_detail->parent_category_detail->id == 12)) {


                for ($x = 0; $x < $OrderPro->quantity; $x++) {
                    $Appsession = new Appointments_Sessions();
                    $Appsession->appointment_id = $App->id;
                    $Appsession->status = 0;
                    $Appsession->price = $ci->price;
                    if ($x == 0) {
                        $Appsession->appointment_date = date('Y-m-d', strtotime($request->bookingdate));
                        $Appsession->appointment_time = $request->bookingstarttime . '-' . $request->bookingendtime;
                    }
                    if ($request->isbooking == 0) {
                        $Appsession->payment_collect = "1";
                    } else {
                        $Appsession->payment_collect = "0";
                    }
                    $Appsession->save();
                }
            }
        }
        \Cart::clear();
        \Cart::session($UserID)->clear();
        \Cart::session($session_id)->clear();
        $request->session()->forget('session_id');
        Auth::logout();
        $IsBooking = $request->isbooking;
        if (setting('take-payment.status') == "1") {
            if ($IsBooking == 0) {
                return response()->json([
                    "status" => "success",
                    "redirect" => '/checkout/payment-proceed/' . $Order->id . '?is_booking=' . $IsBooking,
                    "message" => "Please wait. We are processing your order",
                ]);
            } else {
                dispatch(new NewOrderEmailJob($Order->id, $request->email, "customer"));
                $NotificationEmails = explode(",", env("NOTIFICATION_EMAILS"));
                foreach ($NotificationEmails as $NE) {
                    dispatch(new NewOrderEmailJob($Order->id, $NE, "admin"));
                }
                dispatch(new AppointmentEmailJob($Order->id, $request->email));
                return response()->json([
                    "status" => "success",
                    "redirect" => 'checkout/success?is_booking=' . $IsBooking . "&no=" . $Order->id,
                    "message" => "Your Order placed successfully",
                ]);
                // return redirect('checkout/success?is_booking=' . $IsBooking)->with('success', 'Your order placed successfully');
            }
        }
    }
    public function checkout_success(Request $request, $oid)
    {
        // retu$oid;
        $tickers = $this->tickers();
        $services = $this->services();
        $utm = $this->utmsources();
        $header_links = $this->content_links('1');
        $footer_links = $this->content_links('2');
        $categories = $this->categories();
        $blogcategories = $this->blog_categories();
        $laser_location = $this->laser_locations();
        $trustedcompanies = $this->trusted_companies();
        $cart_items = $this->cart_items($request);
        $this->marketing_campaign($request);
        $OrderInfo = Order::find($oid);
        // if (setting('take-payment.status') == "1") {
        //     $UniqueID = Str::random(10);
        //     $callback = url('/') . "/take-payment/customer-response/order/"  . $OrderInfo->id . "/success";
        //     $redirectback = url('/') . "/take-payment/customer-response/order/"  . $OrderInfo->id . "/failure";
        //     $CustPhone = $OrderInfo->contact_no;
        //     if (empty($CustPhone)) {
        //         $CustPhone = "03222443584";
        //     }
        //     $CustPostCode = $OrderInfo->postal_code;
        //     if (empty($CustPostCode)) {
        //         $CustPostCode = "LU4 8JS";
        //     }
        //     $OrderInfo->takepayment_unique_ref = $UniqueID;
        //     $OrderInfo->save();
        //     $formdata = array(
        //         "merchantID"        => setting('take-payment.merchant_id'),
        //         "amount"            => str_replace('.', '', $OrderInfo->order_total),
        //         "action"            => "SALE",
        //         "type"              => 1,
        //         "countryCode"       => setting('take-payment.country_code'),
        //         "currencyCode"      => setting('take-payment.currency_code'),
        //         "transactionUnique" => $UniqueID,
        //         "orderRef"          => "#OBM" . $OrderInfo->id,
        //         "redirectURL"       => $redirectback,
        //         "callbackURL"         => $callback,
        //         "formResponsive"    => "Y",
        //         "customerName"      => $OrderInfo->customer_detail->name,
        //         "customerAddress"   => $OrderInfo->address,
        //         "customerPostCode"  => $CustPostCode,
        //         "customerEmail"     => $OrderInfo->customer_detail->email,
        //         "customerPhone"     => $CustPhone,
        //         "item1Description"  => "#OBM" . $OrderInfo->id,
        //         "item1Quantity"     => 1,
        //         "item1GrossValue"   => str_replace('.', '', $OrderInfo->order_total)
        //     );
        //     ksort($formdata);
        //     //return $formdata;
        //     $SignatureKey = http_build_query($formdata, '', '&') . setting('take-payment.merchant_secret');
        //     $SignatureKey = hash('SHA512', $SignatureKey);

        //     return view('success', compact(
        //         'tickers',
        //         'utm',
        //         'categories',
        //         'cart_items',
        //         'header_links',
        //         'footer_links',
        //         'OrderInfo',
        //         'SignatureKey',
        //         'UniqueID',
        //         'callback',
        //         'redirectback',
        //         'CustPhone',
        //         'CustPostCode',
        //         'blogcategories',
        //         'laser_location',
        //         'services'
        //     ));
        // } else {
            return view('success', compact(
                'tickers',
                'utm',
                'categories',
                'trustedcompanies',
                'header_links',
                'footer_links',
                'cart_items',
                'laser_location',
                'blogcategories',
                'OrderInfo',
                'services'
            ));
        // }
    }
    public function check_email($email)
    {
        if (Auth::check()) {
            $duplicate = 0;
        } else {
            $duplicate = User::where('email', $email)->count();
        }
        if ($duplicate > 0) {
            $userdata = User::where('email', $email)->first();
            // dd($userdata->id);
            return response()->json([
                'message' => 'Email Already Registered',
                "status" => "exist",
                "user_id" => $userdata->id,
            ]);
        } else {
            return response()->json([
                'message' => 'We cannot find any account associated with this email',
                "status" => "notexist",
            ]);
        }
    }
    public function checkout_success_payment_final(Request $request, $oid)
    {
        $tickers = $this->tickers();
        $utm = $this->utmsources();
        $header_links = $this->content_links('1');
        $footer_links = $this->content_links('2');
        $categories = $this->categories();
        // $blogcategories = $this->blog_categories();
        $laser_location = $this->laser_locations();
        $trustedcompanies = $this->trusted_companies();
        $cart_items = $this->cart_items($request);
        $this->marketing_campaign($request);
        $OrderInfo = Order::find($oid);

        return view('success_payment', compact(
            'tickers',
            'utm',
            'categories',
            'trustedcompanies',
            'header_links',
            'footer_links',
            'cart_items',
            'OrderInfo',
            'laser_location',
            // 'blogcategories'
        ));
    }
}
