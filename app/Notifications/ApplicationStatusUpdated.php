<?php

namespace App\Notifications;

use App\Models\InvestorApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationStatusUpdated extends Notification
{
    use Queueable;

    private const LABELS = [
        'under_review' => 'is now under review',
        'info_requested' => 'requires additional information',
        'approved' => 'has been approved',
        'rejected' => 'was not approved',
    ];

    public function __construct(private InvestorApplication $application)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $label = self::LABELS[$this->application->status] ?? 'has been updated';

        $mail = (new MailMessage)
            ->subject('Update on your ATUNKO investor application')
            ->greeting('Hello '.$notifiable->name.',')
            ->line('Your investor application '.$label.'.');

        if ($this->application->reviewer_notes) {
            $mail->line('Note from our team: '.$this->application->reviewer_notes);
        }

        return $mail->action('View application status', route('investor.status'));
    }

    public function toArray(object $notifiable): array
    {
        $label = self::LABELS[$this->application->status] ?? 'has been updated';

        return [
            'title' => 'Application '.str($this->application->status)->replace('_', ' ')->title(),
            'body' => 'Your investor application '.$label.'.',
            'url' => route('investor.status'),
        ];
    }
}
