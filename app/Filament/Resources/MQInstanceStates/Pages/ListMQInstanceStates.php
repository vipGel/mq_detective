<?php

namespace App\Filament\Resources\MQInstanceStates\Pages;

use App\Filament\Resources\MQInstanceStates\MQInstanceStateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMQInstanceStates extends ListRecords
{
    protected static string $resource = MQInstanceStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
