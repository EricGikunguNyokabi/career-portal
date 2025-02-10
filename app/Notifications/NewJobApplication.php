<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;
use App\Models\JobApplication;

class NewJobApplication extends Notification
{
    use Queueable;
    protected $jobApplication;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobApplication $jobApplication)
    {
        //
        $this->jobApplication = $jobApplication;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database']; // Send via email and store in database
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Job Application Received')
            ->greeting('Hello HR Team,')
            ->line('A new job application has been submitted.')
            ->line('Job Title: ' . $this->jobApplication->job->title)
            ->line('Applicant: ' . $this->jobApplication->user->name)
            ->action('View Application', url('/hr/applicants/' . $this->jobApplication->id))
            ->line('Thank you for using our career portal.');
        }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
