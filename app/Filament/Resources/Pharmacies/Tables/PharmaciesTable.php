<?php

namespace App\Filament\Resources\Pharmacies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PharmaciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('area.name')
                    ->numeric()
                    ->searchable()
                    ->sortable()->label('الحي/المنطقة'),
                TextColumn::make('name')
                    ->searchable()->label('اسم الصيدلية'),
                TextColumn::make('address')
                    ->searchable()->label('عنوان الصيدلية'),
                TextColumn::make('phone')->label('هاتف الصيدلية')
                    ->searchable(),
                TextColumn::make('latitude')->label('خط العرض الخرائطي')
                   ->numeric(decimalPlaces: 7,locale: 'fr',)
                    ->sortable(),
                TextColumn::make('longitude')->label('خط الطول الخرائطي')
                    ->numeric(decimalPlaces: 7,locale: 'fr',)

                    ->sortable(),
                IconColumn::make('is_active')->label('الصيدلية في الخدمة')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
