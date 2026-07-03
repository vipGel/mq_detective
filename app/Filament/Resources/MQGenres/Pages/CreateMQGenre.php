<?php

namespace App\Filament\Resources\MQGenres\Pages;

use App\Filament\Resources\MQGenres\MQGenreResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMQGenre extends CreateRecord
{
    protected static string $resource = MQGenreResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->id();
        return $data;
    }
}
