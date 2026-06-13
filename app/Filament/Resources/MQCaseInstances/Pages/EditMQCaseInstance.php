<?php

namespace App\Filament\Resources\MQCaseInstances\Pages;

use App\Filament\Resources\MQCaseInstances\MQCaseInstanceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMQCaseInstance extends EditRecord
{
    protected static string $resource = MQCaseInstanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
