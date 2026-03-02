<?php

namespace App\Filament\Resources\Duties\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class DutyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('pharmacy_id')
                    ->relationship('pharmacy', 'name')->label('اسم الصيدلية')
                    ->required(),

               DateTimePicker::make('starts_at')->label('تاريخ و توقيت بداية المناوبة')
                ->seconds(false)
                ->displayFormat('Y-m-d H:i')
                  ->native(false)
                ->timezone('Europe/Amsterdam'),

                DateTimePicker::make('ends_at')->label('تاريخ و توقيت نهاية المناوبة')
                ->seconds(false)
                ->displayFormat('Y-m-d H:i')
                  ->native(false)
                ->timezone('Europe/Amsterdam'),

                Select::make('duty_type')->label('نوع / سبب المناوبة')
                    ->options([
                        'night' => 'مناوبة ليلة',
                        'holiday' => 'عيد',
                        'weekend' => 'مناوبة عطلة نهاية الأسبوع',
                    ])
                    ->required(),

            ]);
    }
}
