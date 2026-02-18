<?php

namespace App\Filament\Resources\Starlinks;

use App\Filament\Resources\Starlinks\Pages\CreateStarlink;
use App\Filament\Resources\Starlinks\Pages\EditStarlink;
use App\Filament\Resources\Starlinks\Pages\ListStarlinks;
use App\Filament\Resources\Starlinks\Pages\ViewStarlink;
use App\Filament\Resources\Starlinks\Schemas\StarlinkForm;
use App\Filament\Resources\Starlinks\Schemas\StarlinkInfolist;
use App\Filament\Resources\Starlinks\Tables\StarlinksTable;
use App\Models\Starlink;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StarlinkResource extends Resource
{
    protected static ?string $model = Starlink::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'kit_name';

    public static function form(Schema $schema): Schema
    {
        return StarlinkForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StarlinkInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StarlinksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

//    protected static UnitEnum|string|null $navigationGroup = 'Assets';
    protected static UnitEnum|string|null $navigationGroup = null;

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStarlinks::route('/'),
            'create' => CreateStarlink::route('/create'),
            'view' => ViewStarlink::route('/{record}'),
            'edit' => EditStarlink::route('/{record}/edit'),
        ];
    }
}
