<?php

namespace App\Filament\Resources\MQCases\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MQCaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                Select::make('m_q_genre_id')
                    ->relationship('mQGenre', 'name')
                    ->label('Жанр')
                    ->required(),
                RichEditor::make('briefing')
                    ->label('Брифинг')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('debriefing')
                    ->label('Дебрифинг')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
