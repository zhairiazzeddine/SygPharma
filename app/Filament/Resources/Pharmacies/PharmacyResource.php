<?php

namespace App\Filament\Resources\Pharmacies;

use App\Filament\Resources\Pharmacies\Pages\CreatePharmacy;
use App\Filament\Resources\Pharmacies\Pages\EditPharmacy;
use App\Filament\Resources\Pharmacies\Pages\ListPharmacies;
use App\Filament\Resources\Pharmacies\Schemas\PharmacyForm;
use App\Filament\Resources\Pharmacies\Tables\PharmaciesTable;
use App\Models\Pharmacy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum; // ← مهم استيرادها


class PharmacyResource extends Resource
{
    protected static ?string $model = Pharmacy::class;
    


    protected static ?string $recordTitleAttribute = 'name';


    // ✅ النوع كما في الكلاس الأب: string|BackedEnum|null
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-storefront';

    // ✅ النوع كما في الكلاس الأب: string|UnitEnum|null
    protected static string|UnitEnum|null $navigationGroup = 'إدارة الصيدليات';

    protected static ?string $navigationLabel = 'الصيدليات';
    protected static ?string $modelLabel = 'صيدلية';
    protected static ?string $pluralModelLabel = 'الصيدليات';


    public static function form(Schema $schema): Schema
    {
        return PharmacyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PharmaciesTable::configure($table);
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
            'index' => ListPharmacies::route('/'),
            'create' => CreatePharmacy::route('/create'),
            'edit' => EditPharmacy::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getEloquentQuery(): Builder
{
    $user = auth()->user();

    return parent::getEloquentQuery()
        ->when($user->isPharmacist(),
            fn ($q) => $q->where('id', $user->pharmacy_id)
        );
}

}
