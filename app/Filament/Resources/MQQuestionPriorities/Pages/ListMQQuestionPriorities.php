<?php

namespace App\Filament\Resources\MQQuestionPriorities\Pages;

use App\Filament\Resources\MQQuestionPriorities\MQQuestionPriorityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMQQuestionPriorities extends ListRecords
{
    protected static string $resource = MQQuestionPriorityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
