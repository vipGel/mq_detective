<?php

namespace App\Filament\Resources\MQGenres\Pages;

use App\Filament\Resources\MQGenres\MQGenreResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMQGenre extends EditRecord
{
    protected static string $resource = MQGenreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
