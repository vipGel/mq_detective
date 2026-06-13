<?php

namespace App\Filament\Resources\MQGenres\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MQGenreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
