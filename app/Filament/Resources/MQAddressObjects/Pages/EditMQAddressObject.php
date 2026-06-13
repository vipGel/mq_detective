<?php

namespace App\Filament\Resources\MQAddressObjects\Pages;

use App\Filament\Resources\MQAddressObjects\MQAddressObjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMQAddressObject extends EditRecord
{
    protected static string $resource = MQAddressObjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
