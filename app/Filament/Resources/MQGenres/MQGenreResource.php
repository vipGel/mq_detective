<?php

namespace App\Filament\Resources\MQGenres;

use App\Filament\Resources\MQGenres\Pages\CreateMQGenre;
use App\Filament\Resources\MQGenres\Pages\EditMQGenre;
use App\Filament\Resources\MQGenres\Pages\ListMQGenres;
use App\Filament\Resources\MQGenres\Schemas\MQGenreForm;
use App\Filament\Resources\MQGenres\Tables\MQGenresTable;
use App\Models\MQGenre;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MQGenreResource extends Resource
{
    protected static ?string $model = MQGenre::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    protected static ?string $recordTitleAttribute = 'name';
    protected static string|null|\UnitEnum $navigationGroup = 'Static';

    protected static ?string $label = 'Жанр';
    protected static ?string $pluralModelLabel = 'Жанры';


    public static function form(Schema $schema): Schema
    {
        return MQGenreForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MQGenresTable::configure($table);
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
            'index' => ListMQGenres::route('/'),
            'create' => CreateMQGenre::route('/create'),
            'edit' => EditMQGenre::route('/{record}/edit'),
        ];
    }
}
