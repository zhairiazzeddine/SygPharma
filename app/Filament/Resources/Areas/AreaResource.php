<?php

namespace App\Filament\Resources\Areas;

use App\Filament\Resources\Areas\Pages\CreateArea;
use App\Filament\Resources\Areas\Pages\EditArea;
use App\Filament\Resources\Areas\Pages\ListAreas;
use App\Filament\Resources\Areas\Schemas\AreaForm;
use App\Filament\Resources\Areas\Tables\AreasTable;
use App\Models\Area;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables;

use Filament\Tables\Actions;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum; // ← مهم استيرادها

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;


    protected static ?string $recordTitleAttribute = 'name';
        // ✅ النوع كما في الكلاس الأب: string|BackedEnum|null
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-globe-americas';

    // ✅ النوع كما في الكلاس الأب: string|UnitEnum|null
    protected static string|UnitEnum|null $navigationGroup = 'إدارة الأحياء و المناطق';

    protected static ?string $navigationLabel = 'الأحياء';
    protected static ?string $modelLabel = 'حي/منطقة';
    protected static ?string $pluralModelLabel = 'الأحياء/المناطق';

    public static function form(Schema $schema): Schema
    {
        return AreaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AreasTable::configure($table);
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
            'index' => ListAreas::route('/'),
            'create' => CreateArea::route('/create'),
            'edit' => EditArea::route('/{record}/edit'),
        ];
    }
    
    public static function canViewAny(): bool
{
    return auth()->user()->isAdmin();
}

}
