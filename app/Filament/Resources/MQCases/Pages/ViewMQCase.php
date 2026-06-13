<?php

namespace App\Filament\Resources\MQCases\Pages;

use App\Filament\Resources\MQCases\MQCaseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMQCase extends ViewRecord
{
    protected static string $resource = MQCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
