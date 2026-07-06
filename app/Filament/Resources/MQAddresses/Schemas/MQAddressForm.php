<?php

namespace App\Filament\Resources\MQAddresses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;

class MQAddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Название')
                    ->required(),
                Grid::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('letter')
                            ->label('Буква номера')
                            ->required(),
                        TextInput::make('number')
                            ->label('Цифра номера')
                            ->regex('/^[0-9\/]+$/')
                            ->numeric()
                            ->required(),
                    ]),

                Select::make('m_q_address_object_id')
                    ->relationship('mQAddressObject', 'name')
                    ->required()
                    ->label('Точка интереса'),
                Select::make('m_q_genre_id')
                    ->relationship('mQGenre', 'name')
                    ->required()
                    ->label('Жанр'),
            ]);
    }
}
