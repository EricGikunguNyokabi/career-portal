<?php


namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\JobApplication;
use App\Models\User;


class NewJobApplication extends Notification implements ShouldQueue
{
    use Queueable;

    protected $jobApplication;
    protected $applicant;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobApplication $jobApplication, User $applicant)
    {
        $this->jobApplication = $jobApplication;
        $this->applicant = $applicant;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // Send via email and store in database
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Job Application Received')
            ->greeting('Hello HR Team,')
            ->line('A new job application has been submitted.')
            ->line('Job Title: ' . $this->jobApplication->job->title)
            ->line('Applicant: ' . $this->applicant->email)
            ->action('View Application', url('/hr/applicants/' . $this->jobApplication->id))
            ->line('Thank you for using our career portal.');
    }

    /**
     * Store the notification in the database.
     */
    public function toArray($notifiable)
    {
        return [
            'job_title' => $this->jobApplication->job->title,
            'applicant_email' => $this->applicant->email,
            'application_id' => $this->jobApplication->id,
            'message' => 'New job application for ' . $this->jobApplication->job->title,
            'url' => url('/hr/applicants/' . $this->jobApplication->id),
        ];
    }
}
