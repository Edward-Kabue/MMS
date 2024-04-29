<?php

namespace App\Http\Controllers;
use App\Models\Invoice;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
   //load the invoice datafrom the database
    public function generateInvoice($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        //pass on the invoice total
        $invoiceTotal = $invoice->total;
        // Generate the invoice PDF using a DomPDF instance
        $pdf = PDF::loadView('invoices.pdf', ['invoice' => $invoice]);
        //store the new invoice in the storage folder
        $pdfPath = storage_path('app\public\invoices\invoice.pdf');
        file_put_contents($pdfPath, $pdf->output());
        // Store the PDF in a storage disk
        Storage::disk('public')->put('invoices/invoice.pdf', file_get_contents($pdfPath));
        // Return the path to the generated PDF
        return $pdfPath;
    }
}
