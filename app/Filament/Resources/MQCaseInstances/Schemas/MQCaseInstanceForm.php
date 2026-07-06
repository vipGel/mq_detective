<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

use App\Models\MQCaseInstance;
use Filament\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MQCaseInstanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Текста
                Flex::make([
                    Section::make([
                        Grid::make()
                            ->columns(3)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Название')
                                    ->default(null),
                                TextInput::make('game_duration')
                                    ->label('Длительность игры')
                                    ->numeric()
                                    ->required()
                                    ->disabledOn('edit'),
                                //TODO add a simplified calculation
                                PlaceHolder::make('team_points')
                                    ->label('Очки команды')
                                    ->numeric()
                                    ->default(null)
                                    ->content(fn($record) => $record?->calculated_team_points)
                                    ->hidden(fn(?MQCaseInstance $record) => !$record),
                                Select::make('m_q_case_id')
                                    ->relationship('mQCase', 'name')
                                    ->searchable()
                                    ->required()
                                    ->label('Кейс')
                                    ->disabledOn('edit'),
                                Select::make('m_q_instance_state_id')
                                    ->relationship('mQInstanceState', 'name')
                                    ->default(1)
                                    ->label('Статус')
                                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                                    ->disabled()
                                    ->placeholder('-')
                                    ->poll(5),
                            ]),
                    ]),
                ])->columnSpan('full'),


                // Кнопки
                Grid::make()
                    ->columns(3)
                    ->hidden(fn(?MQCaseInstance $record) => !$record)
                    ->schema([
                        Action::make('start_game')
                            ->label('Начать игру')
                            ->action(function (MQCaseInstance $instance) {
                                $instance->setStartedState();
                            })
                            ->disabled(function (?MQCaseInstance $record) {
                                return $record->m_q_instance_state_id === 4
                                    || $record->m_q_instance_state_id === 2;
                            })
                            ->successNotificationTitle('Игра начата!'),
                        Action::make('pause_game')
                            ->label('Поставить на паузу')
                            ->action(function (MQCaseInstance $instance) {
                                $instance->setPausedState();
                            })
                            ->disabled(function (?MQCaseInstance $record) {
                                return $record->m_q_instance_state_id === 4
                                    || $record->m_q_instance_state_id === 3
                                    || $record->m_q_instance_state_id === 1;
                            })
                            ->successNotificationTitle('Game paused!'),
                        Action::make('end_game')
                            ->label('Закончить игру')
                            ->action(function (MQCaseInstance $instance) {
                                $instance->setEndedState();
                            })
                            ->disabled(function (?MQCaseInstance $record) {
                                return $record->m_q_instance_state_id === 4
                                    || $record->m_q_instance_state_id === 1;
                            })
                            ->successNotificationTitle('Game ended!'),
                    ])->columnSpan('full'),

                // Таймштампы
                Grid::make()
                    ->columns(4)
                    ->schema([
                        TextEntry::make('started_at')
                            ->label('Начат')
                            ->dateTime()
                            ->placeholder('-')
                            ->hidden(fn(?MQCaseInstance $record) => !$record),
                        TextEntry::make('paused_at')
                            ->label('На паузе')
                            ->dateTime()
                            ->placeholder('-')
                            ->hidden(fn(?MQCaseInstance $record) => !$record),
                        TextEntry::make('ended_at')
                            ->label('Закончен')
                            ->dateTime()
                            ->hidden(fn(?MQCaseInstance $record) => !$record)
                            ->placeholder('-'),
                        TextEntry::make('ends_at')
                            ->label('Будет закончено')
                            ->dateTime()
                            ->hidden(fn(?MQCaseInstance $record) => !$record)
                            ->placeholder('-'),
                    ])->columnSpan('full'),
            ]);
    }
}
