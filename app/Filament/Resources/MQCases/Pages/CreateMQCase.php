<?php

namespace App\Filament\Resources\MQCases\Pages;

use App\Filament\Resources\MQCases\MQCaseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMQCase extends CreateRecord
{
    protected static string $resource = MQCaseResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->id();
        return $data;
    }
}
