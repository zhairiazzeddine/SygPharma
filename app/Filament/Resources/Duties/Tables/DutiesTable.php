<?php

namespace App\Filament\Resources\Duties\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

use Illuminate\Database\Eloquent\Builder;

class DutiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pharmacy.name')
                ->label('الصيدلية')
                ->sortable()
                ->searchable(),
                TextColumn::make('starts_at')->label('تاريخ و توقيت بداية الماوبة')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('ends_at')->label('تاريخ و توقيت نهاية المناوبة')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('duty_type')->label('نوع أو سبب المناوبة')
                    ->searchable(),
                TextColumn::make('creator.name')
                    ->numeric()->label('أُضيفت بواسطة')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
           // ✅ الأكشنات لكل سجل (صف)
            ->recordActions([
                // استعمله فقط إذا عندك صفحة عرض (View page) للمناوبات
                // ViewAction::make(),

                EditAction::make()
                    ->label('تعديل'),
                     ViewAction::make()
                    ->label('عرض'),

                DeleteAction::make()
                    ->label('حذف')
                    ->requiresConfirmation(),
            ])

            // ✅ الأكشنات الجماعية (على السجلات المحددة)
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('حذف المحدد')
                        ->requiresConfirmation(),
                ]),
            ]);
    }
}
