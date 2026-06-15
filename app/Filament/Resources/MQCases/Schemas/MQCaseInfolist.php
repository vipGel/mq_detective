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
                TextEntry::make('name'),
                TextEntry::make('briefing')
                    ->columnSpanFull(),
                TextEntry::make('debriefing')
                    ->columnSpanFull(),
                TextEntry::make('mQGenre.name')
                    ->label('Genre'),
            ]);
    }
}
