<?php

namespace App\Filament\Resources\MQAddresses\Pages;

use App\Filament\Resources\MQAddresses\MQAddressResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMQAddress extends EditRecord
{
    protected static string $resource = MQAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
