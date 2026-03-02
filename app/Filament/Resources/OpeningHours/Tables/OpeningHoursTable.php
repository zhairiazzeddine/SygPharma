<?php

namespace App\Filament\Resources\OpeningHours\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OpeningHoursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pharmacy.name')
                    ->numeric()->label('الصيدلية ')
                    ->sortable(),
                TextColumn::make('day_of_week')
                ->label('اليوم')
                ->formatStateUsing(function ($state) {
                    // 0 = Sunday ... 6 = Saturday (Carbon default)
                    $days = [
                        0 => 'الأحد',
                        1 => 'الإثنين',
                        2 => 'الثلاثاء',
                        3 => 'الأربعاء',
                        4 => 'الخميس',
                        5 => 'الجمعة',
                        6 => 'السبت',
                    ];

                    return $days[$state] ?? $state;
                })
                ->sortable(),
                TextColumn::make('opens_at')
                    ->time() ->label('يفتح عند')
                ->time('H:i')
                    ->sortable(),
                TextColumn::make('closes_at')
                    ->time()
                    ->label('يغلق عند')
                ->time('H:i')
                    ->sortable(),
                IconColumn::make('is_closed')
                    ->boolean()->label('الصيدلية مغلقة'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
