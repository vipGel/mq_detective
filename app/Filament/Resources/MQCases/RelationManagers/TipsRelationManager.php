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

    protected static ?string $title = 'Tips';
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('hint')
                    ->required(),
                TextInput::make('clue')
                    ->required(),
                TextInput::make('time')
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
                    ->searchable(),
                TextColumn::make('clue')
                    ->searchable(),
                TextColumn::make('time')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()->label('New Tip'),
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
