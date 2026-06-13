<?php

namespace App\Filament\Resources\MQCaseInstances;

use App\Filament\Resources\MQCaseInstances\Pages\CreateMQCaseInstance;
use App\Filament\Resources\MQCaseInstances\Pages\EditMQCaseInstance;
use App\Filament\Resources\MQCaseInstances\Pages\ListMQCaseInstances;
use App\Filament\Resources\MQCaseInstances\Pages\ViewMQCaseInstance;
use App\Filament\Resources\MQCaseInstances\Schemas\MQCaseInstanceForm;
use App\Filament\Resources\MQCaseInstances\Schemas\MQCaseInstanceInfolist;
use App\Filament\Resources\MQCaseInstances\Tables\MQCaseInstancesTable;
use App\Models\MQCaseInstance;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MQCaseInstanceResource extends Resource
{
    protected static ?string $model = MQCaseInstance::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Case Instance';

    public static function form(Schema $schema): Schema
    {
        return MQCaseInstanceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MQCaseInstanceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MQCaseInstancesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMQCaseInstances::route('/'),
            'create' => CreateMQCaseInstance::route('/create'),
            'view' => ViewMQCaseInstance::route('/{record}'),
            'edit' => EditMQCaseInstance::route('/{record}/edit'),
        ];
    }
}
