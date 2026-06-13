<?php

namespace App\Filament\Resources\MQCases\Schemas;

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
                    ->required(),
                Textarea::make('briefing')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('debriefing')
                    ->required()
                    ->columnSpanFull(),
                Select::make('m_q_genre_id')
                    ->relationship('genre', 'name')
                    ->required(),
            ]);
    }
}
