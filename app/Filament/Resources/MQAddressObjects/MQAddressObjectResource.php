<?php

namespace App\Filament\Resources\MQAddressObjects;

use App\Filament\Resources\MQAddressObjects\Pages\CreateMQAddressObject;
use App\Filament\Resources\MQAddressObjects\Pages\EditMQAddressObject;
use App\Filament\Resources\MQAddressObjects\Pages\ListMQAddressObjects;
use App\Filament\Resources\MQAddressObjects\Schemas\MQAddressObjectForm;
use App\Filament\Resources\MQAddressObjects\Tables\MQAddressObjectsTable;
use App\Models\MQAddressObject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MQAddressObjectResource extends Resource
{
    protected static ?string $model = MQAddressObject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::MapPin;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Address Objects';

    protected static string|null|\UnitEnum $navigationGroup = 'Static';

    public static function form(Schema $schema): Schema
    {
        return MQAddressObjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MQAddressObjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMQAddressObjects::route('/'),
            'create' => CreateMQAddressObject::route('/create'),
            'edit' => EditMQAddressObject::route('/{record}/edit'),
        ];
    }
}
