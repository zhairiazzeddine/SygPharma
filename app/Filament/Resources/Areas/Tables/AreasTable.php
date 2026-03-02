<?php

namespace App\Filament\Resources\Areas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

final class AreasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('الحي/المنطقة')
                    ->searchable()
                    ->sortable(),
            ])

            // ✅ أكشنات لكل سجل
            ->recordActions([
                ViewAction::make(),   // عرض
                EditAction::make(),   // تعديل
                DeleteAction::make(), // حذف
            ])

            // ✅ أكشنات جماعية
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}