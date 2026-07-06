<?php

namespace App\Filament\Resources\MQCaseInstances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MQCaseInstancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Название')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('calculated_team_points')
                    ->numeric()
                    ->label('Очки команды')
                    ->sortable(),
                TextColumn::make('mQCase.name')
                    ->sortable()
                    ->label('Кейс'),
                TextColumn::make('admin.name')
                    ->label('Админ')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mQInstanceState.name')
                    ->sortable()
                    ->searchable()
                    ->label('Статус'),
                TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Обновлен')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
