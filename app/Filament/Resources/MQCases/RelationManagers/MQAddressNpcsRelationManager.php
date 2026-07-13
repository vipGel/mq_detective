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
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MQAddressNpcsRelationManager extends RelationManager
{
    protected static string $relationship = 'mQAddressNpcs';

    protected static ?string $title = 'NPC';


    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('information')
                    ->label('Информация')
                    ->required(),
                TextInput::make('application_path')
                    ->label('Путь к приложению')
                    ->default(null),
                Select::make('m_q_address_id')
                    ->label('Адрес')
                    ->relationship('mQAddress', 'name')
                    ->searchable()
                    ->required(),
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
                TextEntry::make('mQAddress.name')
                    ->label('Адрес'),
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
                TextColumn::make('application_path')
                    ->label('Путь к приложению')
                    ->searchable(),
                TextColumn::make('mQAddress.name')
                    ->label('Адрес')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
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
