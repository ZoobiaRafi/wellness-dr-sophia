<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;

class SendAppointmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order_id;
    protected $is_reminder = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id, $is_reminder = null)
    {
        $this->order_id = $order_id;
        $this->is_reminder = $is_reminder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $OrderData = Order::join('order_products AS OP', 'OP.order_id', '=', 'orders.id')
            ->join('tests AS T', 'T.id', '=', 'OP.test_id')->where(['orders.id' => $this->order_id])->get(['orders.full_name', 'OP.booking_date', 'OP.booking_time', 'T.title', 'orders.address', 'orders.email', 'orders.id','orders.created_at']);
        $id = $OrderData[0]->id;
        $full_name = $OrderData[0]->full_name;
        $email = $OrderData[0]->email;
        $booking_date = $OrderData[0]->booking_date;
        $appointment_time = $OrderData[0]->booking_time;
        $address = $OrderData[0]->address;
        $order_date = $OrderData[0]->created_at;

        #region Generating Test Names and converting into Comma Seperate text and putting AND between the last two
        $servicenamearr = array();
        foreach ($OrderData as $key => $item):
            array_push($servicenamearr, $item->title);
        endforeach;

        $firstPart = implode(', ', array_slice($servicenamearr, 0, -2));
        $lastPart = implode(' AND ', array_slice($servicenamearr, -2));

        $test_title = $firstPart;
        if (!empty($firstPart) && !empty($lastPart)) {
            $test_title .= ', ' . $lastPart;
        } elseif (empty($firstPart) && !empty($lastPart)) {
            $test_title = $lastPart;
        }
        #endregion Generating Test Names and converting into Comma Seperate text and putting AND between the last two

        $subject = "Confirmation for Your ".$test_title." Appointment";

        if($this->is_reminder == "Pre24Hours"):
            $subject = "Friendly Reminder: Your Upcoming ".$test_title." Appointment Tomorrow";
        endif;
        $HtmlPath = "emails.appointment_confirmation.appointment_confirmation2";
        $OrderInfo = Order::find($this->order_id);
        $is_reminder = $this->is_reminder;
        return $this->subject($subject)->from('orders@optimizedbodyandmind.co.uk','Optimized Body & Mind')->markdown($HtmlPath, compact('full_name','email','booking_date','appointment_time','address','test_title','id','is_reminder','order_date'));
    }
}
