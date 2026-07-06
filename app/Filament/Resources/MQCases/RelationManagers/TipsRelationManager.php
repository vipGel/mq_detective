<?php

namespace App\Filament\Resources\MQCases\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TipsRelationManager extends RelationManager
{
    protected static string $relationship = 'mQTips';

    protected static ?string $title = 'Подсказки';
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('hint')
                    ->label('Подсказки')
                    ->required(),
                TextInput::make('clue')
                    ->label('Наводка')
                    ->required(),
                TextInput::make('time')
                    ->label('Время')
                    ->required()
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('hint')
            ->columns([
                TextColumn::make('hint')
                    ->label('Подсказка')
                    ->searchable(),
                TextColumn::make('clue')
                    ->label('Наводка')
                    ->searchable(),
                TextColumn::make('time')
                    ->label('Время')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Создать подсказку'),
//                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
//                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
