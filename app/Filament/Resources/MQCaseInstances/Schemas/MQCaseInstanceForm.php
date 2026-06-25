<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

use App\Models\MQCaseInstance;
use Filament\Actions\Action;
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

                Action::make('start_game')
                    ->action(function (MQCaseInstance $instance) {
                        $instance->setStartedState();
                    })
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->disabled(function (?MQCaseInstance $record) {
                        return $record?->started_at ?? true;
                    })
                    ->successNotificationTitle('Game started!'),
                Action::make('end_game')
                    ->action(function (MQCaseInstance $instance) {
                        $instance->setEndedState();
                    })
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->disabled(function (?MQCaseInstance $record) {
                        if (!$record) {
                            return true;
                        }
                        return $record?->ended_at ?? false;
                    })
                    ->successNotificationTitle('Game ended!'),
            ]);
    }
}
