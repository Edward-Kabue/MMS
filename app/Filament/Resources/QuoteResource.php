<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use App\Filament\Resources\QuoteResource\RelationManagers;
use App\Models\Quote;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

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
                Forms\Components\Select::make('contact_id')
                    ->required()
                    ->label('Contact')
                    ->options(function () {
                        return \App\Models\Contact::pluck('email', 'id');
                    }),
                Forms\Components\TextInput::make('quote_number')
                    ->required()
                    ->default(function () {
                        $latestQuote = Quote::latest('id')->first();
                        if ($latestQuote) {
                            $lastQuoteNumber = $latestQuote->quote_number;
                            $lastQuoteNumber = str_replace('Q-', '', $lastQuoteNumber);
                            $nextQuoteNumber = 'Q-' . str_pad($lastQuoteNumber + 1, 5, '0', STR_PAD_LEFT);
                            return $nextQuoteNumber;
                        }
                        return 'Q-00001';
                    }),
                Forms\Components\DatePicker::make('quote_date')
                ->native(false)
                    ->required(),
                Forms\Components\DatePicker::make('expiry_date')
                ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'draft' => 'Draft',
                        'sent' => 'Sent',
                    ])
                    ->default('draft'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organization.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact.email')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quote_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quote_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expiry_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
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
            'index' => Pages\ListQuotes::route('/'),
            'create' => Pages\CreateQuote::route('/create'),
            'edit' => Pages\EditQuote::route('/{record}/edit'),
        ];
    }
}
