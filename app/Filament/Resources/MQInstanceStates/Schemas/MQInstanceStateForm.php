<?php

namespace App\Filament\Resources\MQInstanceStates\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MQInstanceStateForm
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
