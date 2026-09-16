<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationSubmitted extends Notification
{
    use Queueable;

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your ATUNKO investor application has been received')
            ->greeting('Thank you, '.$notifiable->name.'.')
            ->line('We have received your investor application and supporting information.')
            ->line('Our compliance and investment teams will review your submission and update you here and by email.')
            ->action('View application status', route('investor.status'))
            ->line('This does not constitute an offer, commitment or acceptance of investment.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Application submitted',
            'body' => 'Your investor application has been received and is now under review.',
            'url' => route('investor.status'),
        ];
    }
}
