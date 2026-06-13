<?php

namespace App\Filament\Resources\MQAddressObjects\Pages;

use App\Filament\Resources\MQAddressObjects\MQAddressObjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMQAddressObjects extends ListRecords
{
    protected static string $resource = MQAddressObjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
