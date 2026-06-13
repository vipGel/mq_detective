<?php

namespace App\Filament\Resources\MQAddressObjects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MQAddressObjectForm
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
