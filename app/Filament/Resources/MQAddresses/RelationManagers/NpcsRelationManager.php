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

    protected static ?string $title = 'NPC';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('information')
                    ->label('Информация')
                    ->required(),
                //TODO add tooltip
                TextInput::make('application_path')
                    ->label('Путь к приложению')
                    ->default(null),
                Select::make('m_q_case_id')
                    ->relationship('mQCase', 'name')
                    ->required()
                    ->searchable()
                    ->label('Кейс'),
            ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('information')
                    ->label('Информация'),
                TextEntry::make('application_path')
                    ->label('Путь к приложению')
                    ->placeholder('-'),
                TextEntry::make('mQCase.name')
                    ->label('Кейс'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('information')
            ->columns([
                TextColumn::make('information')
                    ->label('Информация')
                    ->searchable(),
                TextColumn::make('mQCase.name')
                    ->sortable()
                    ->label('Кейс'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()->label('Создать нпс'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
