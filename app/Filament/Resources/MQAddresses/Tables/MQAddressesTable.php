<?php

namespace App\Filament\Resources\MQAddresses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MQAddressesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('letter_number')
                    ->sortable()
                    ->label('Номер')
                    ->searchable(),
                TextColumn::make('mQAddressObject.name')
                    ->sortable()
                    ->label('Точка интереса')
                    ->searchable(),
                TextColumn::make('mQGenre.name')
                    ->sortable()
                    ->label('Жанр')
                    ->searchable(),
                TextColumn::make('author.name')
                    ->sortable()
                    ->searchable()
                    ->label('Автор'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
