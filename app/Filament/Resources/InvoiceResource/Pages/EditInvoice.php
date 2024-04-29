<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use Filament\Actions;
use App\Models\Invoice;
use App\Mail\InvoiceMailer;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\InvoiceResource;


class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            //pass on the invoice id to the pdf controller when the send button is clicked
            Action::make('Send')
                ->message('Are you sure you want to send this invoice?')
                ->confirmText('Send')
                ->cancelText('Cancel')
                ->handler(fn (Invoice $invoice) => Mail::to($invoice->contact->email)->send(new InvoiceMailer($invoice))),
          
            
        
        ];
    }
}
