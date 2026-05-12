<?php 
namespace App\Mail;
use App\Models\Book;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ReservationConfirmation extends Mailable
{
    public function __construct(public Book $booking)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Confirma tu reserva",
        );
    }

    public function content(): Content
    {
        return new Content(view: "mail.reservation-confirmation");
    }
}
