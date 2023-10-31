<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\BlockedDate;
use Illuminate\Http\Request;
use App\Category;
use App\LaserSession;
use App\Models\User;
use App\Order;
use App\OrderProduct;
use App\Room;
use App\Test;
use Carbon\Carbon;

class FrontendController extends Controller
{
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
    public function index()
    {
        $view = 'index';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function gallery()
    {
        $view = 'beauty-gallery';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function blogListing()
    {
        $view = 'blog-listing';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function blogDetail()
    {
        $view = 'blog-detail';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function gp()
    {
        $view = 'gp-consultation';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function terms()
    {
        $view = 'terms';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function treatments($slug)
    {
        $thisService = $this->currentService($slug);
        $treatments = $this->currentServiceTreatments($thisService->id);
        $services = $this->services();
        $servExcludeCurrent = $this->servicesExcludeCurrent($thisService->id);
        $view = 'services';

        return view($view, compact('services', 'thisService', 'treatments', 'servExcludeCurrent'));
    }
    public function treatmentService($slug)
    {
        $thisTreatment = $this->currentTreatment($slug);
        $treatments = $this->currentServiceTreatments($thisTreatment->id);
        $services = $this->services();
        $servExcludeCurrent = $this->servicesExcludeCurrent($thisTreatment->id);
        $view = 'treatment-service';

        return view($view, compact('services', 'thisTreatment', 'treatments', 'servExcludeCurrent'));
    }
    public function gpConsultation_submit(Request $request)
    {
        $User = User::where('email', $request->email)->first();
        if (!isset($User)) {
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
        $Order = new Order();
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
        if ($request->utm_source != null ||  $request->utm_medium != null || $request->utm_campaign != null || $request->utm_term != null) {
            $Order->campaign_sources = $request->utm_source . ',' . $request->utm_medium . ',' . $request->utm_campaign . ',' . $request->utm_term;
        }
        $Order->save();
        $OrderPro = new OrderProduct();
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
        $NewApp->appointment_date = date('Y-m-d', strtotime($request->bookingdate));
        $NewApp->appointment_start_time = $request->bookingstarttime;
        $NewApp->appointment_end_time = $request->bookingendtime;
        $NewApp->appointment_time = $request->bookingstarttime . "-" . $request->bookingendtime;
        $NewApp->save();

        if ($request->id == 0) {
            if (setting('take-payment.status') == "1") {
                return response()->json([
                    "status" => "success",
                    "redirect" => 'checkout/payment-proceed/' . $Order->id . '?is_booking=0',
                    "message" => "Please wait. We are processing your order",
                ]);
            }
        } else {
            // dispatch(new NewOrderEmailJob($Order->id, $request->email, "customer"));
            $NotificationEmails = explode(",", env("NOTIFICATION_EMAILS"));
            foreach ($NotificationEmails as $NE) {
                // dispatch(new NewOrderEmailJob($Order->id, $NE, "admin"));
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
            if(!empty($testinfo->app_days)){
                $timestamp_date = strtotime($request->date);
                $dayofweek = strtolower(date('l', $timestamp_date));
                $appointmentdays = explode(',',$testinfo->app_days);
                foreach($appointmentdays as $days){
                    if($days == $dayofweek){
                        $flag++;
                    }
                }
                $flag;
                if($flag == 0){
                    return response()->json([
                        'message' => 'Sorry there is no available appointments.',
                        'status' => "422",
                    ]);
                }
            }

            if($testinfo->appointment_perday != "" || $testinfo->appointment_perday != null){
                $appointmentperday = Appointment::where('test_id',$request->get('product_id'))->where('appointment_date',date('Y-m-d',strtotime($request->date)))->count();
                if($appointmentperday >= $testinfo->appointment_perday){
                    return response()->json([
                        'message' => 'Apologies, fully booked. Explore another day for your optimized experience.',
                        'status' => "422"
                    ]);
                }
            }

            // return $testinfo->category . "-" . $testinfo->gender; 
            if($testinfo->category == 1 || $testinfo->category == 2 || $testinfo->category == 4 || $testinfo->category == 7 || $testinfo->category == 8 || $testinfo->category == 10){
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

            if($testinfo->category == 1){
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

            if($testinfo->category == 5){ //&& $testinfo->gender == 2){
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
            if($testinfo->category != 9){
                if($request->date == '05-06-2023'){
                    return response()->json([
                        'message' => 'Sorry we are fully booked.',
                        'status' => "422"
                    ]);
                }
            }
            $checkblockdate = date('Y-m-d',strtotime($request->date));
            $BlockedDate = BlockedDate::whereDate('block_date',$checkblockdate)->first();
            
            if(isset($BlockedDate->id)){
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
                if($request->sessionid != ""){
                    $lasersession = LaserSession::find($request->sessionid);
                    if($lasersession->hours != null || $lasersession->minutes){
                        $hours = $lasersession->hours;
                        $pro_minutes = $lasersession->minutes;    
                    }
                    else{
                        $hours = $product_detail->hours;
                        $pro_minutes = $product_detail->minutes;    
                    }
                }
                else{
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
            if($request->date == $currentDate){
                $start_time = strtotime(setting('appointments.starting_time')) + 3 * 60 * 60;
            }
            else{
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
            if($day != "sunday"){
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
            foreach($product_detail->rooms as $rooms){
                $roomid = $rooms->room_id;
            }
        
            // check_booking__orders
            if ($request->get('product_id') != "" && $request->get('product_id') > 0) {
                $appointments = Appointment::where('appointment_date', $date)
                    ->where(function ($q) use($request) {
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

            if(isset($product_detail->app_time_from) && isset($product_detail->app_time_to)){
                if($request->date == $currentDate){
                    $start_time = strtotime($product_detail->app_time_from + 3 * 60 * 60);
                }
                else{
                    $start_time = strtotime($product_detail->app_time_from);
                }
                $end_time = strtotime($product_detail->app_time_to);
            }
            
            for ($i = $start_time; $i < $end_time; $i += $pro_minutes * $seconds) {
                // return $count;
                if (date("H:i", $i + $minutes * $count) < date("H:i", $break_time_start) || date("H:i", $i + $minutes * $count) >= date("H:i", $break_time_end)) {
                  $appointment_time = date("H:i", $i + $minutes * $count) . ' - ' . date("H:i", $i + $pro_minutes * $seconds + $minutes * $count);
                  $available_apponintment_bookings = Appointment::where('appointment_date', $request->date)->where('appointment_time',$appointment_time)->where('room_id', $roomid)->get();  //appopiintment held in this date
                  $count_apponintment_bookings = Appointment::where('appointment_date', $request->date)
                  ->where('appointment_time',$appointment_time)
                  ->where('room_id', $roomid)->count();  //available_services in this room at this date
    
                  if ($date == date('Y-m-d')) {
                    if (date("H:i", $i + $minutes * $count) >= $today_hours->format('H:i')) {
                        if(date("H:i", $i + $pro_minutes * $seconds + $minutes * $count) < date("H:i", $end_time)){
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
                   
                    if(date("H:i", $i + $pro_minutes * $seconds + $minutes * $count) < date("H:i", $end_time)){
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
}
