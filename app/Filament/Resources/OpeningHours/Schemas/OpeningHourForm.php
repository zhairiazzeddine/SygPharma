<?php

namespace App\Filament\Resources\OpeningHours\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;


class OpeningHourForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Select::make('day_of_week')
    ->options([
         0 => 'الأحد',
        1 => 'الإثنين',
        2 => 'الثلاثاء',
        3 => 'الأربعاء',
        4 => 'الخميس',
        5 => 'الجمعة',
        6 => 'السبت',
    ])->label('اليوم')
    ->required()
    ->unique(
        table: 'opening_hours',
        column: 'day_of_week',
        ignoreRecord: true,
        modifyRuleUsing: fn ($rule) =>
            $rule->where('pharmacy_id', auth()->user()->pharmacy_id)
    ),

Toggle::make('is_closed')->label('الصيدلية مغلقة')
    ->reactive(),

TimePicker::make('opens_at')->label('توقيت بدء العمل')
    ->required(fn (Get $get) => ! $get('is_closed'))->native(false)->seconds(false)
                    ->timezone('Europe/Amsterdam'),

TimePicker::make('closes_at')->label('توقيت نهاية العمل')
    ->required(fn (Get $get) => ! $get('is_closed'))
    ->after('opens_at')->native(false)->seconds(false)
                    ->timezone('Europe/Amsterdam'),

            ]);
    }
}
