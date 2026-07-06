<?php

namespace App\Filament\Resources\MQCaseInstances\RelationManagers;

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

class MQUserAnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'mQUserAnswers';

    protected static ?string $title = 'Ответы игроков';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('answer')
                    ->label('Ответ')
                    ->required()
                    ->disabled(),
                TextInput::make('points')
                    ->label('Очки')
                    ->numeric()
                    ->default(null),
                Select::make('m_q_question_id')
                    ->relationship('mQQuestion', 'question')
                    ->required()
                    ->label('Вопрос')
                    ->disabled(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Игрок')
                    ->required()
                    ->disabled(),
            ]);
    }

//    public function infolist(Schema $schema): Schema
//    {
//        return $schema
//            ->components([
//                TextEntry::make('answer'),
//                TextEntry::make('points')
//                    ->numeric()
//                    ->placeholder('-'),
//                TextEntry::make('mQQuestion.id')
//                    ->label('Question'),
//                TextEntry::make('user.name')
//                    ->label('User'),
//                TextEntry::make('created_at')
//                    ->dateTime()
//                    ->placeholder('-'),
//                TextEntry::make('updated_at')
//                    ->dateTime()
//                    ->placeholder('-'),
//            ]);
//    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('answer')
            ->columns([
                TextColumn::make('answer')
                    ->label('Ответ')
                    ->searchable(),
                TextColumn::make('points')
                    ->label('Очки')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('mQQuestion.question')
                    ->searchable()
                    ->label('Вопрос'),
                TextColumn::make('user.name')
                    ->label('Игрок')
                    ->searchable(),
                TextColumn::make('Отвечен')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('Оценен')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
//                CreateAction::make(),
//                AssociateAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
//                DissociateAction::make(),
//                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
//                    DissociateBulkAction::make(),
//                    DeleteBulkAction::make(),
                ]),
            ])
            ->poll('5s');
    }
}
