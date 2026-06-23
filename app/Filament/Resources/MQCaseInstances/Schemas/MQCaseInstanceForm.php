<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MQCaseInstanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->default(null),
                PlaceHolder::make('team_points')
                    ->numeric()
                    ->default(null)
                    ->content(fn($record) => $record?->calculated_team_points),
                Select::make('m_q_case_id')
                    ->relationship('mQCase', 'name')
                    ->searchable()
                    ->required()
                    ->label('Case')
                    ->disabledOn('edit'),
                Select::make('m_q_instance_state_id')
                    ->relationship('mQInstanceState', 'name')
                    ->default(1)
                    ->required()
                    ->label('Case Instance State')
                    ->disabledOn('create'),
            ]);
    }
}
