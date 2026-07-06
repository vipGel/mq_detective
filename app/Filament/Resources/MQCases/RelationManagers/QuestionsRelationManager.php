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

class QuestionsRelationManager extends RelationManager
{
    protected static string $relationship = 'mQQuestions';

    protected static ?string $title = 'Вопросы';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                    ->label('Вопрос')
                    ->required(),
                TextInput::make('answer')
                    ->label('Ответ')
                    ->required(),
                TextInput::make('proof')
                    ->label('Доказательство')
                    ->required(),
                Select::make('m_q_question_priority_id')
                    ->relationship('mQQuestionPriority', 'name')
                    ->required()
                    ->label('Тип вопроса'),
                TextInput::make('max_points')
                    ->label('Максимум очков')
                    ->required()
                    ->numeric(),
            ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('question')
                    ->label('Вопрос'),
                TextEntry::make('answer')
                    ->label('Ответ'),
                TextEntry::make('proof')
                    ->label('Доказательство'),
                TextEntry::make('mQQuestionPriority.name')
                    ->label('Тип вопроса'),
                TextEntry::make('max_points')
                    ->label('Максимум вопрос')
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                TextColumn::make('question')
                    ->label('Вопрос')
                    ->searchable(),
                TextColumn::make('answer')
                    ->label('Ответ')
                    ->searchable(),
                TextColumn::make('proof')
                    ->label('Доказательство')
                    ->searchable(),
                TextColumn::make('mQQuestionPriority.name')
                    ->sortable()
                    ->label('Тип вопроса'),
                TextColumn::make('max_points')
                    ->label('Максимум очков')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()->label('Создать вопрос'),
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
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
