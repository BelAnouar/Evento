<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SendTicket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected Event $event
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Ticket',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $jsonData = json_encode([
            'title' => $this->event->title,
            'location' => $this->event->location,
            'date' => $this->event->date,
            'startTime' => $this->event->start_time,
            'endTime' => $this->event->end_time,
        ]);


        $qrCode = QrCode::size(200)->generate($jsonData);
        return new Content(
            view: 'ticket',
            with: [
                'image' => $this->event->image,
                "title" => $this->event->title,
                "location" => $this->event->location,
                "date" => $this->event->date,
                "startTime" => $this->event->start_time,
                "endTime" => $this->event->end_time,
                'qrCode' => $qrCode,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
