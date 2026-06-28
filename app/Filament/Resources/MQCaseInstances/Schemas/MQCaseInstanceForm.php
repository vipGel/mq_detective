<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

use App\Models\MQCaseInstance;
use Filament\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MQCaseInstanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->default(null),
                TextInput::make('game_duration')
                    ->numeric()
                    ->required()
                    ->disabledOn('edit'),
                //TODO add a simplified calculation
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
                    ->label('Case Instance State')
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->disabled()
                    ->placeholder('-')
                    ->poll(5),

                TextEntry::make('started_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->hidden(fn(?MQCaseInstance $record) => !$record),
                TextEntry::make('paused_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->hidden(fn(?MQCaseInstance $record) => !$record),
                TextEntry::make('ended_at')
                    ->dateTime()
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->placeholder('-'),
                TextEntry::make('ends_at')
                    ->dateTime()
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->placeholder('-'),

                Action::make('start_game')
                    ->action(function (MQCaseInstance $instance) {
                        $instance->setStartedState();
                    })
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->disabled(function (?MQCaseInstance $record) {
                        return $record->m_q_instance_state_id === 4 || $record->m_q_instance_state_id === 2;
                    })
                    ->successNotificationTitle('Game started!'),
                Action::make('pause_game')
                    ->action(function (MQCaseInstance $instance) {
                        $instance->setPausedState();
                    })
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->disabled(function (?MQCaseInstance $record) {
                        return $record->m_q_instance_state_id === 4 || $record->m_q_instance_state_id === 3;
                    })
                    ->successNotificationTitle('Game paused!'),
                Action::make('end_game')
                    ->action(function (MQCaseInstance $instance) {
                        $instance->setEndedState();
                    })
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->disabled(function (?MQCaseInstance $record) {
                        return $record->m_q_instance_state_id === 4;
                    })
                    ->successNotificationTitle('Game ended!'),
            ]);
    }
}
