<?php

namespace App\Filament\Resources\MQQuestionPriorities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MQQuestionPriorityForm
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
