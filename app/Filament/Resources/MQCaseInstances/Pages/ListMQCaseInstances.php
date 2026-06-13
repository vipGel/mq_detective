<?php

namespace App\Filament\Resources\MQCaseInstances\Pages;

use App\Filament\Resources\MQCaseInstances\MQCaseInstanceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMQCaseInstances extends ListRecords
{
    protected static string $resource = MQCaseInstanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
