<?php

namespace App\Filament\Resources\MQCaseInstances\RelationManagers;

use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

//    public function form(Schema $schema): Schema
//    {
//        return $schema
//            ->components([
//                TextInput::make('name')
//                    ->required(),
//                TextInput::make('email')
//                    ->label('Email address')
//                    ->email()
//                    ->required(),
//                DateTimePicker::make('email_verified_at'),
//                TextInput::make('password')
//                    ->password()
//                    ->required(),
//                Select::make('role_id')
//                    ->relationship('role', 'name')
//                    ->default(null),
//            ]);
//    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
//                TextColumn::make('email_verified_at')
//                    ->dateTime()
//                    ->sortable(),
                TextColumn::make('role.name')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
//                CreateAction::make(),
                AttachAction::make(),
            ])
            ->recordActions([
//                EditAction::make(),
                DetachAction::make(),
//                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DetachBulkAction::make(),
//                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
