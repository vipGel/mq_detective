<?php

namespace App\Filament\Resources\MQCaseInstances\Schemas;

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
                TextEntry::make('team_points')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('case.name'),
                TextEntry::make('admin.name')
                    ->label('Admin'),
                TextEntry::make('state.name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
