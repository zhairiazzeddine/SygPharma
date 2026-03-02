<?php

namespace App\Filament\Resources\OpeningHours;

use App\Filament\Resources\OpeningHours\Pages\CreateOpeningHour;
use App\Filament\Resources\OpeningHours\Pages\EditOpeningHour;
use App\Filament\Resources\OpeningHours\Pages\ListOpeningHours;
use App\Filament\Resources\OpeningHours\Schemas\OpeningHourForm;
use App\Filament\Resources\OpeningHours\Tables\OpeningHoursTable;
use App\Models\OpeningHour;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum; // ← مهم استيرادها


class OpeningHourResource extends Resource
{
    protected static ?string $model = OpeningHour::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'إدارة مواقيت العمل';

    protected static ?string $navigationLabel = 'مواقيت العمل';

    protected static ?string $modelLabel = 'توقيت عمل';

    protected static ?string $pluralModelLabel = 'مواقيت العمل';


    public static function form(Schema $schema): Schema
    {
        return OpeningHourForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OpeningHoursTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isPharmacist();
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->isPharmacist();
    }



    public static function getPages(): array
    {
        return [
            'index' => ListOpeningHours::route('/'),
            'create' => CreateOpeningHour::route('/create'),
            'edit' => EditOpeningHour::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->where('pharmacy_id', auth()->user()->pharmacy_id);
}


}
