<?php

namespace App\Filament\Resources\MQGenres\Pages;

use App\Filament\Resources\MQGenres\MQGenreResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMQGenres extends ListRecords
{
    protected static string $resource = MQGenreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
