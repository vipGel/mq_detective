<?php

namespace App\Filament\Resources\MQQuestionPriorities;

use App\Filament\Resources\MQQuestionPriorities\Pages\CreateMQQuestionPriority;
use App\Filament\Resources\MQQuestionPriorities\Pages\EditMQQuestionPriority;
use App\Filament\Resources\MQQuestionPriorities\Pages\ListMQQuestionPriorities;
use App\Filament\Resources\MQQuestionPriorities\Schemas\MQQuestionPriorityForm;
use App\Filament\Resources\MQQuestionPriorities\Tables\MQQuestionPrioritiesTable;
use App\Models\MQQuestionPriority;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MQQuestionPriorityResource extends Resource
{
    protected static ?string $model = MQQuestionPriority::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|null|\UnitEnum $navigationGroup = 'Static';

    protected static ?string $label = 'Question Types';



    public static function form(Schema $schema): Schema
    {
        return MQQuestionPriorityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MQQuestionPrioritiesTable::configure($table);
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
            'index' => ListMQQuestionPriorities::route('/'),
            'create' => CreateMQQuestionPriority::route('/create'),
            'edit' => EditMQQuestionPriority::route('/{record}/edit'),
        ];
    }
}
