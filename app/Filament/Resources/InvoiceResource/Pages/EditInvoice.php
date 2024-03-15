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
            Action::make('send')
            ->label('Send Invoice')
            ->action(function (Invoice $record, array $data) {
                Mail::to('recipient@example.com')->send(new InvoiceMailer($record));

                Notification::make()
                    ->title('Invoice Sent')
                    ->success()
                    ->send();
            })
          
            
        
        ];
    }
}
