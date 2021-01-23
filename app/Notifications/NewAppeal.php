<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAppeal extends Notification
{
    use Queueable;
    public $appeal;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($appeal)
    {
        $this->appeal = $appeal;
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

    public function toDatabase($notifiable)
    {
        return [
           'appeal_id'=>$this->appeal->id,
           'appeal_type'=>$this->appeal->appeal_type,
           'appeal_user'=>$this->appeal->user_id,
           
        ];
    }
}
