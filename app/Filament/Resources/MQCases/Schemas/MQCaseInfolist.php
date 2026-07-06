<?php

namespace App\Filament\Resources\MQCases\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MQCaseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Название'),
                TextEntry::make('mQGenre.name')
                    ->label('Жанр'),
                TextEntry::make('briefing')
                    ->label('Брифинг')
                    ->html()
                    ->columnSpanFull(),
                TextEntry::make('debriefing')
                    ->label('Дебрифинг')
                    ->html()
                    ->columnSpanFull(),
            ]);
    }
}
