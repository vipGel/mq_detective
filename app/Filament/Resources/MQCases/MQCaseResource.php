<?php

namespace App\Filament\Resources\MQCases;

use App\Filament\Resources\MQCases\Pages\CreateMQCase;
use App\Filament\Resources\MQCases\Pages\EditMQCase;
use App\Filament\Resources\MQCases\Pages\ListMQCases;
use App\Filament\Resources\MQCases\Pages\ViewMQCase;
use App\Filament\Resources\MQCases\RelationManagers\QuestionsRelationManager;
use App\Filament\Resources\MQCases\RelationManagers\TipsRelationManager;
use App\Filament\Resources\MQCases\Schemas\MQCaseForm;
use App\Filament\Resources\MQCases\Schemas\MQCaseInfolist;
use App\Filament\Resources\MQCases\Tables\MQCasesTable;
use App\Models\MQCase;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MQCaseResource extends Resource
{
    protected static ?string $model = MQCase::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::FolderOpen;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $label = 'Кейс';
    protected static ?string $pluralModelLabel = 'Кейсы';

    protected static string|null|\UnitEnum $navigationGroup = 'Cases';

    public static function form(Schema $schema): Schema
    {
        return MQCaseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MQCaseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MQCasesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            TipsRelationManager::class,
            QuestionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMQCases::route('/'),
            'create' => CreateMQCase::route('/create'),
            'view' => ViewMQCase::route('/{record}'),
            'edit' => EditMQCase::route('/{record}/edit'),
        ];
    }
}
