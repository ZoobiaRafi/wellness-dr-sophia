<?php

namespace App\Jobs;

use App\Mail\SendAppointmentEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class AppointmentEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $order_id;
    protected $email;

    protected $is_reminder = null;
    public function __construct($order_id,$email,$is_reminder = null)
    {
        $this->order_id = $order_id;
        $this->email = $email;
        $this->is_reminder = $is_reminder;
}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email_html = new SendAppointmentEmail($this->order_id, $this->is_reminder);
        Mail::to($this->email)->send($email_html);

    }
}