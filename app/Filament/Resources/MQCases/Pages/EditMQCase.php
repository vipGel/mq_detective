<?php

namespace App\Filament\Resources\MQCases\Pages;

use App\Filament\Resources\MQCases\MQCaseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMQCase extends EditRecord
{
    protected static string $resource = MQCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
