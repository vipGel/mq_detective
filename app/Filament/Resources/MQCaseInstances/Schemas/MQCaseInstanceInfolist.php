<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MQCaseInstanceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->placeholder('-'),
                PlaceHolder::make('team_points')
                    ->numeric()
                    ->default(null)
                    ->content(fn ($record) => $record?->calculated_team_points),
                TextEntry::make('mQCase.name'),
                TextEntry::make('admin.name')
                    ->label('Admin'),
                TextEntry::make('mQInstanceState.name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
