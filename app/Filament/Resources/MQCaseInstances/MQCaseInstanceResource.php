<?php

namespace App\Filament\Resources\MQCaseInstances;

use App\Filament\Resources\MQCaseInstances\Pages\CreateMQCaseInstance;
use App\Filament\Resources\MQCaseInstances\Pages\EditMQCaseInstance;
use App\Filament\Resources\MQCaseInstances\Pages\ListMQCaseInstances;
use App\Filament\Resources\MQCaseInstances\Pages\ViewMQCaseInstance;
use App\Filament\Resources\MQCaseInstances\RelationManagers\MQUserAnswersRelationManager;
use App\Filament\Resources\MQCaseInstances\RelationManagers\UserAddressRelationManager;
use App\Filament\Resources\MQCaseInstances\RelationManagers\UsersRelationManager;
use App\Filament\Resources\MQCaseInstances\Schemas\MQCaseInstanceForm;
use App\Filament\Resources\MQCaseInstances\Schemas\MQCaseInstanceInfolist;
use App\Filament\Resources\MQCaseInstances\Tables\MQCaseInstancesTable;
use App\Models\MQCaseInstance;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MQCaseInstanceResource extends Resource
{
    protected static ?string $model = MQCaseInstance::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentDuplicate;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Case Instance';

    protected static string|null|\UnitEnum $navigationGroup = 'Cases';

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
            UsersRelationManager::class,
            UserAddressRelationManager::class,
            MQUserAnswersRelationManager::class,
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (auth()->user()->hasRole('super_admin')) {
            return $query;
        }

        return $query->where('admin_id', auth()->id());
    }
}
