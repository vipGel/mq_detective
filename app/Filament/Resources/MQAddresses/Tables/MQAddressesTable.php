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
                //TODO make "$letter/$number"
                TextColumn::make('letter')
                    ->searchable(),
                TextColumn::make('number')
                    ->searchable(),
                TextColumn::make('mQAddressObject.name')
                    ->sortable()
                    ->label('Point of Interest'),
                TextColumn::make('mQGenre.name')
                    ->sortable()
                    ->label('Genre'),
                TextColumn::make('author.name')
                    ->sortable()
                    ->label('Author'),
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
