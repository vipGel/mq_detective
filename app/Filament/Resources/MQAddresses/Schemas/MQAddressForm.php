<?php

namespace App\Filament\Resources\MQAddresses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MQAddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('letter')
                    ->required(),
                TextInput::make('number')
                    ->required(),
                Select::make('m_q_address_object_id')
                    ->relationship('mQAddressObject', 'name')
                    ->required()
                    ->label('Address Object'),
                Select::make('m_q_genre_id')
                    ->relationship('mQGenre', 'name')
                    ->required()
                    ->label('Genre'),
            ]);
    }
}
