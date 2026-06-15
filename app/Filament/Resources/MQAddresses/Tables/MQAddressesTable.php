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
                    ->searchable(),
                TextColumn::make('number')
                    ->searchable(),
                TextColumn::make('m_q_address_object_id')
                    ->numeric()
                    ->sortable()
                    ->label('Address Object'),
                TextColumn::make('m_q_genre_id')
                    ->numeric()
                    ->sortable()
                    ->label('Genre'),
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
