<?php

namespace App\Filament\Resources\MQAddressObjects\Pages;

use App\Filament\Resources\MQAddressObjects\MQAddressObjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMQAddressObject extends CreateRecord
{
    protected static string $resource = MQAddressObjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->id();
        return $data;
    }
}
