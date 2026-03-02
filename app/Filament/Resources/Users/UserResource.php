<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
    use Illuminate\Database\Eloquent\Builder;

use UnitEnum; // ← مهم استيرادها

class UserResource extends Resource
{
    protected static ?string $model = User::class;


    protected static ?string $recordTitleAttribute = 'name';


    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static string|UnitEnum|null $navigationGroup ='إدارة المسؤولين و الصيادلة';

    protected static ?string $navigationLabel = 'المسؤولين و الصيادلة';

    protected static ?string $modelLabel = 'مسؤوول أو صيدلاني';

    protected static ?string $pluralModelLabel = 'المسؤولين/الصيادلة';


    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
{
    return auth()->user()->isAdmin();
}

public static function shouldRegisterNavigation(): bool
{
    return auth()->user()->isAdmin();
}


}
