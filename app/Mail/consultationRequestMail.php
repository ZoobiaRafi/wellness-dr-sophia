<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class consultationRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $order_id;
     protected $template;
 
    public function __construct($order_id,$template)
    {
        $this->order_id = $order_id;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $HtmlPath = "emails.orders.customer";
        $OrderInfo = Order::find($this->order_id);
        
        $subject = "Your Order #" . $this->order_id . " at Optimized Body & Mind";
        if($this->template == "admin") {
            $subject = "Order #" . $this->order_id . " Received";
            $HtmlPath = "emails.orders.admin";
            $OrderInfo = Order::find($this->order_id);
        }
        return $this->subject($subject)->from('orders@optimizedbodyandmind.co.uk','Optimized Body & Mind')->view($HtmlPath, compact('OrderInfo'));
    }
}
