<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVotersID extends Notification
{
    use Queueable;

    protected $url, $title, $code;

    public function __construct($url, $title, $code)
    {
        $this->url = $url;
        $this->title = $title;
        $this->code = $code;

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
        return $this->getMessage();

    }

    public function getMessage()
    {
        return (new MailMessage)
                    ->line('This is election of :: "' . $this->title . '"')
                    ->line('Your Voter ID :: ' . $this->code)
                    ->action('GOTO TO LOGIN', $this->url)
                    ->line('Thank you for using our application!');
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
