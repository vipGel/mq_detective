<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

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
                TextInput::make('team_points')
                    ->numeric()
                    ->default(null)
                    ->disabled(),
                Select::make('m_q_case_id')
                    ->relationship('mQCase', 'name')
                    ->searchable()
                    ->required()
                    ->label('Case')
                    ->disabledOn('edit'),
                Select::make('m_q_instance_state_id')
                    ->relationship('mQInstanceState', 'name')
                    ->required()->label('Case Instance State'),
            ]);
    }
}
