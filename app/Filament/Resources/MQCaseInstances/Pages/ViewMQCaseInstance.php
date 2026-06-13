<?php

namespace App\Filament\Resources\MQCaseInstances\Pages;

use App\Filament\Resources\MQCaseInstances\MQCaseInstanceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMQCaseInstance extends ViewRecord
{
    protected static string $resource = MQCaseInstanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
