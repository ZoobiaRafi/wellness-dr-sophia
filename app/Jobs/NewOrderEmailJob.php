<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendOrderEmail;
use App\Order;
use Mail;

class NewOrderEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $order_id;
    protected $email;
    protected $template;

    public function __construct($order_id, $email, $template)
    {
        $this->order_id = $order_id;
        $this->email = $email;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email_html = new SendOrderEmail($this->order_id,$this->template);
        Mail::to($this->email)->send($email_html);
        $OrderUpdate = Order::find($this->order_id);
        $OrderUpdate->email_status = 1;
        $OrderUpdate->save();
    }
}
