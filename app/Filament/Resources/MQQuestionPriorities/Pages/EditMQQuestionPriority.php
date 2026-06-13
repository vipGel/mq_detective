<?php

namespace App\Filament\Resources\MQQuestionPriorities\Pages;

use App\Filament\Resources\MQQuestionPriorities\MQQuestionPriorityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMQQuestionPriority extends EditRecord
{
    protected static string $resource = MQQuestionPriorityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
