<?php

namespace App\Filament\Resources\Pharmacies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class PharmacyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('area_id')
                    ->relationship('area', 'name')->label('الحي/المنطقة')
                    ->required()
                    ->disabled(fn () => auth()->user()->isPharmacist()),
                    TextInput::make('address')->label('عنوان الصيدلية')
                    ->required()
                    ->maxLength(255),

                TextInput::make('name')->required()->label('اسم الصيدلية'),

                TextInput::make('phone')->tel()->label('هاتف الصيدلية'),

                Toggle::make('is_active')->label('في الخدمة')
                    ->visible(fn () => auth()->user()->isAdmin()),

                TextInput::make('latitude')
                    ->label('خط العرض في خرائط غوغل')
                    ->numeric()
                     ->required()
                    ->step('any')
                    // تحقق من المدى
                    ->rule('between:-90,90')
                    // تنظيف القيمة قبل الحفظ في DB
                    ->dehydrateStateUsing(function ($state) {
                        if ($state === null || $state === '') {
                            return null;
                        }

                        // استبدال الفاصلة العربية/الفرنسية بنقطة
                        $state = str_replace(',', '.', (string) $state);

                        $value = (float) $state;

                        // رقم غير منطقي (مثل 6.3E+15) → نرجعه كما هو ليرفضه الـ rule
                        if (! is_finite($value)) {
                            return $state;
                        }

                        // تقريب إلى 7 أرقام عشرية
                        return round($value, 7);
                    }),

                TextInput::make('longitude')
                    ->label('خط الطول في خرائط غوغل')
                    ->numeric()
                     ->required()
                    ->step('any')
                    ->rule('between:-180,180')
                    ->dehydrateStateUsing(function ($state) {
                        if ($state === null || $state === '') {
                            return null;
                        }

                        $state = str_replace(',', '.', (string) $state);
                        $value = (float) $state;

                        if (! is_finite($value)) {
                            return $state;
                        }

                        return round($value, 7);
                    }),

            ]);
    }
}
