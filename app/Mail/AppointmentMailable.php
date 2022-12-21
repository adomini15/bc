<?php

namespace App\Mail;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $confirmationUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment, $confirmationUrl)
    {
        $this->appointment = $appointment;
        $this->confirmationUrl = $confirmationUrl;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Confirmation Appointment',
            tags: ['appointment']
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        Carbon::setLocale('es');
        
        return new Content(
            markdown: 'emails.appointments.confirm',
            with: [
                'appointmentId' => $this->appointment->id,
                'customerName' => $this->appointment->customer->firstname . ' ' . $this->appointment->customer->lastname,
                'serviceName' => $this->appointment->service->title,
                'serviceDescription' => $this->appointment->service->description,
                'beauticianName' => $this->appointment->beautician->firstname . ' ' . $this->appointment->beautician->lastname,
                'date' => Carbon::parse($this->appointment->taken_date)->diffForHumans(),
                'price' => $this->appointment->service->price,
                'title' => $this->appointment->service->title,
                'description' => $this->appointment->service->description,
                'confirmationUrl' => $this->confirmationUrl
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
