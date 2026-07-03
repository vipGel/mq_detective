<?php

namespace App\Filament\Resources\MQAddresses\Pages;

use App\Filament\Resources\MQAddresses\MQAddressResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMQAddress extends CreateRecord
{
    protected static string $resource = MQAddressResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->id();
        return $data;
    }
}
