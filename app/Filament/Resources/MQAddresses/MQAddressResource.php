<?php

namespace App\Filament\Resources\MQAddresses;

use App\Filament\Resources\MQAddresses\Pages\CreateMQAddress;
use App\Filament\Resources\MQAddresses\Pages\EditMQAddress;
use App\Filament\Resources\MQAddresses\Pages\ListMQAddresses;
use App\Filament\Resources\MQAddresses\RelationManagers\NpcsRelationManager;
use App\Filament\Resources\MQAddresses\Schemas\MQAddressForm;
use App\Filament\Resources\MQAddresses\Tables\MQAddressesTable;
use App\Models\MQAddress;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MQAddressResource extends Resource
{
    protected static ?string $model = MQAddress::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::HomeModern;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $pluralModelLabel = 'Адреса';
    protected static ?string $label = 'Адрес';

    protected static string|null|\UnitEnum $navigationGroup = 'Cases';

    public static function form(Schema $schema): Schema
    {
        return MQAddressForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MQAddressesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
//            NpcsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMQAddresses::route('/'),
            'create' => CreateMQAddress::route('/create'),
            'edit' => EditMQAddress::route('/{record}/edit'),
        ];
    }
}
