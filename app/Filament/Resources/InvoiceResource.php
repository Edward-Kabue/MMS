<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('organization_id')
                    ->required()
                    ->label('Organization')
                    ->options(function () {
                        return \App\Models\Organization::pluck('name', 'id');
                    }),
                Forms\Components\Select::make('quote_id')
                    ->required()
                    ->label('Quote')
                    ->options(function () {
                        return \App\Models\Quote::pluck('quote_number', 'id');
                    }),
                Forms\Components\Select::make('contact_id')
                    ->required()
                    ->label('Contact')
                    ->options(function () {
                        return \App\Models\Contact::pluck('email', 'id');
                    }),
                Forms\Components\TextInput::make('invoice_number')
                    ->required()
                    ->maxLength(255)
                    ->default(function () {
                        $latestInvoice = \App\Models\Invoice::latest('id')->first();
                        if ($latestInvoice) {
                            $lastInvoiceNumber = $latestInvoice->invoice_number;
                            $lastInvoiceNumber = str_replace('INV-', '', $lastInvoiceNumber);
                            $nextInvoiceNumber = 'INV-' . str_pad($lastInvoiceNumber + 1, 5, '0', STR_PAD_LEFT);
                            return $nextInvoiceNumber;
                        }
                        return 'INV-00001';
                    }),
                Forms\Components\DatePicker::make('invoice_date')
                    ->native(false)
                    ->required(),
                Forms\Components\DatePicker::make('due_date')
                ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organization.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quote.quote_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact.email')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('invoice_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
