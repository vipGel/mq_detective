<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

use App\Models\MQCaseInstance;
use Filament\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MQCaseInstanceInfolist
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
                                TextEntry::make('name')
                                    ->label('Название')
                                    ->placeholder('-'),
                                TextEntry::make('game_duration')
                                    ->label('Длительность игры')
                                    ->numeric(),
                                PlaceHolder::make('team_points')
                                    ->label('Очки команды')
                                    ->numeric()
                                    ->default(null)
                                    ->content(fn($record) => $record?->calculated_team_points),
                                TextEntry::make('mQCase.name')
                                ->label('Кейс'),
                                TextEntry::make('admin.name')
                                    ->label('Админ'),
                                TextEntry::make('mQInstanceState.name')
                                    ->label('Статус'),
                            ]),
                    ])
                ])->columnSpanFull(),

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
                            ->successNotificationTitle('Game started!'),
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
                    ->columns(5)
                    ->schema([
                        TextEntry::make('started_at')
                            ->label('Начат')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('ended_at')
                            ->label('Закончен')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('ends_at')
                            ->label('Будет закончено')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->label('Создан')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->label('Обновлен')
                            ->dateTime()
                            ->placeholder('-'),
                    ])->columnSpanFull(),
            ]);
    }
}
