<?php

namespace App\Filament\Resources\MQCases\Pages;

use App\Filament\Resources\MQCases\MQCaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMQCases extends ListRecords
{
    protected static string $resource = MQCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
