<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Overstayed extends Notification
{
    use Queueable;
    public $blood_type;
    public $bbName;
    public $blood_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($blood_type, $bbName, $blood_id)
    {
        $this->blood_type = $blood_type;
        $this->bbName = $bbName;
        $this->blood_id = $blood_id;
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
            "appeal_type"=>"Blood Overstayed",
            "message"=>"Blood Type ".$this->blood_type. " with id of ".$this->blood_id." has stayed for more than 6 weeks in " . $this->bbName. " blood bank.",
            
        ];
    }
}
