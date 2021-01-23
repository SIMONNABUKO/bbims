<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowBlood extends Notification
{
    use Queueable;
    public $blood_type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($blood_type)
    {
        $this->blood_type = $blood_type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            "appeal_type" =>"Low blood Count",
            "message"=>"The blood type ".$this->blood_type." is below the minimum required quantity for a blood bank, please make a blood supply appeal!"
        ];
    }
}
