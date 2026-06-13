<?php

namespace App\Filament\Resources\MQAddresses\Pages;

use App\Filament\Resources\MQAddresses\MQAddressResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMQAddresses extends ListRecords
{
    protected static string $resource = MQAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
