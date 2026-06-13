<?php

namespace App\Filament\Resources\MQInstanceStates\Pages;

use App\Filament\Resources\MQInstanceStates\MQInstanceStateResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMQInstanceState extends EditRecord
{
    protected static string $resource = MQInstanceStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
