<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendToEmployeurNotification extends Notification
{
    use Queueable;

    public $object;
    public $message;
    public function __construct($object, $message)
    {
        //
        $this->object = $object;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->from('informations@cnac.dz','CNAC INFROMATION')
                ->subject("A/S " . $this->object)
                ->greeting(" ")
                ->line($this->message)
                ->line("Merci")
                ->line('<hr>')
                ->salutation("Le service DESI DG")
                ->template('vendor.notifications.code');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
