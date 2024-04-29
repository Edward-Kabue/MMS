<?php

namespace App\Mail;

use Dompdf\Dompdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMailer extends Mailable
{
    use Queueable, SerializesModels;

public $invoice;
    

    /**
     * Create a new message instance.
     */
    public function __construct($invoice)
    {
        //
        $this -> invoice = $invoice;
    }
    /**
 * Build the message.
 *
 * @return $this
 */
public function build()
{
    return $this->subject('Invoice Mailer')
                ->view('emails.invoice')
                ->attachData($this->generateInvoice(), 'invoice.pdf');
}

/**
 * Generate the invoice PDF.
 *
 * @return string
 */
private function generateInvoice()
{
    // Generate the invoice PDF using a DomPDF instance
    $dompdf = new Dompdf();
//LOAD THE BLADE FILE 
    $dompdf->loadHtml(view('invoices.pdf', ['invoice' => $this->invoice])->render());
    //store the new invoice in the storage folder
    $pdfPath = storage_path('app\public\invoices\invoice.pdf');

    file_put_contents($pdfPath, $dompdf->output());

    // Store the PDF in a storage disk
    Storage::disk('public')->put('invoices/invoice.pdf', file_get_contents($pdfPath));

    // Return the path to the generated PDF
    return $pdfPath;
}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice Mailer',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
