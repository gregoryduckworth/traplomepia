<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserPasswordEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $token = $this->token;

        $url = route("password.reset.token", $token);
        $intro = "Your email has been used to register an account. Before ";
        $intro .= "enabling the account, we would like to make sure you have ";
        $intro .= "access to the email address.";

        $outro = "If you did not initiate this request, please reply to this ";
        $outro .= "email. We take your privacy very seriously.";

        return (new MailMessage)
            ->success()
            ->subject('Account Activation')
            ->line($intro)
            ->action('Activate Your Account', $url)
            ->line($outro)
            ->line('Regards,')
            ->line('Your ' . config('app.name') . ' Team');
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
