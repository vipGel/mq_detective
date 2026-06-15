<?php

namespace App\Filament\Resources\MQInstanceStates;

use App\Filament\Resources\MQInstanceStates\Pages\CreateMQInstanceState;
use App\Filament\Resources\MQInstanceStates\Pages\EditMQInstanceState;
use App\Filament\Resources\MQInstanceStates\Pages\ListMQInstanceStates;
use App\Filament\Resources\MQInstanceStates\Schemas\MQInstanceStateForm;
use App\Filament\Resources\MQInstanceStates\Tables\MQInstanceStatesTable;
use App\Models\MQInstanceState;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MQInstanceStateResource extends Resource
{
    protected static ?string $model = MQInstanceState::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Signal;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|null|\UnitEnum $navigationGroup = 'Static';

    protected static ?string $label = 'Case Instance States';



    public static function form(Schema $schema): Schema
    {
        return MQInstanceStateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MQInstanceStatesTable::configure($table);
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
            'index' => ListMQInstanceStates::route('/'),
            'create' => CreateMQInstanceState::route('/create'),
            'edit' => EditMQInstanceState::route('/{record}/edit'),
        ];
    }
}
