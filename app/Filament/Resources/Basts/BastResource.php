<?php

namespace App\Filament\Resources\Basts;

use App\Models\Bast;
use App\Filament\Resources\Basts\Pages\CreateBast;
use App\Filament\Resources\Basts\Pages\EditBast;
use App\Filament\Resources\Basts\Pages\ListBasts;
use App\Filament\Resources\Basts\Tables\BastsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use UnitEnum;
use App\Filament\Resources\Basts\Schemas\BastForm;

class BastResource extends Resource
{
    protected static ?string $model = Bast::class;

    protected static ?string $navigationLabel = 'BAST';
    protected static string|UnitEnum|null $navigationGroup = 'Dokumen';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;


    public static function form(Schema $schema): Schema
    {
        return BastForm::configure($schema);
    }


    public static function table(Table $table): Table
    {
        return BastsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBasts::route('/'),
            'create' => CreateBast::route('/create'),
            'edit' => EditBast::route('/{record}/edit'),
        ];
    }
}
