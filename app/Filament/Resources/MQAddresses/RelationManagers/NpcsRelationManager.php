<?php

namespace App\Filament\Resources\MQAddresses\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NpcsRelationManager extends RelationManager
{
    protected static string $relationship = 'mQNpcs';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('information')
                    ->required(),
                TextInput::make('application_path')
                    ->default(null),
//                Select::make('address_id')
//                    ->relationship('address', 'name')
//                    ->required(),
                Select::make('m_q_case_id')
                    ->relationship('mQCase', 'name')
                    ->required()
                    ->label('Case'),
            ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('information'),
                TextEntry::make('application_path')
                    ->placeholder('-'),
//                TextEntry::make('address.name')
//                    ->label('Address'),
                TextEntry::make('mQCase.name'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('information')
            ->columns([
                TextColumn::make('information')
                    ->searchable(),
//                TextColumn::make('application_path')
//                    ->searchable(),
                TextColumn::make('mQCase.name')
                    ->sortable()->label('Case'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()->label('Create NPC'),
//                AssociateAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
//                DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
//                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
