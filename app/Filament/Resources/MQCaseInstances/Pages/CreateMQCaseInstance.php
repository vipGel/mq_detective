<?php

namespace App\Filament\Resources\MQCaseInstances\Pages;

use App\Filament\Resources\MQCaseInstances\MQCaseInstanceResource;
use App\Models\MQCase;
use Filament\Resources\Pages\CreateRecord;

class CreateMQCaseInstance extends CreateRecord
{
    protected static string $resource = MQCaseInstanceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['admin_id'] = auth()->id();
        $data['m_q_instance_state_id'] = 1;
        $name = auth()->user()->name;
        $case = MQCase::find($data['m_q_case_id']);
        $data['name'] ??= $name . "'s " . $case->name . " game";
        return $data;
    }
}
