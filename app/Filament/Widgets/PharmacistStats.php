<?php

namespace App\Filament\Widgets;

use App\Models\Duty;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class PharmacistStats extends StatsOverviewWidget
{
    // بدون static
    protected ?string $heading = 'إحصائيات الصيدلية';

    public static function canView(): bool
    {
        $user = auth()->user();

    return $user && $user->role === 'pharmacist';
    }

    protected function getStats(): array
    {
        $user = auth()->user();
        $pharmacyId = $user->pharmacy_id ?? null;

        if (! $pharmacyId) {
            return [
                Stat::make('لا توجد صيدلية مربوطة بالحساب', '-'),
            ];
        }

        $now = now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        // 🔹 إجمالي المناوبات
        $totalDuties = Duty::query()
            ->where('pharmacy_id', $pharmacyId)
            ->count();

        // 🔹 المناوبات القادمة
        $upcomingDuties = Duty::query()
            ->where('pharmacy_id', $pharmacyId)
            ->where('starts_at', '>', $now)
            ->count();

        // 🔹 المناوبات المكتملة هذا الشهر
        $completedThisMonth = Duty::query()
            ->where('pharmacy_id', $pharmacyId)
            ->whereBetween('ends_at', [$startOfMonth, $endOfMonth])
            ->where('ends_at', '<', $now)
            ->count();

        return [
            Stat::make('إجمالي المناوبات', $totalDuties)
                ->description('كل المناوبات المسجلة')->descriptionIcon('heroicon-m-arrow-trending-up') ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success')
                ->icon('heroicon-o-queue-list'),

            Stat::make('مناوبات قادمة', $upcomingDuties)
                ->description('مناوبات لم تبدأ بعد')->descriptionIcon('heroicon-m-arrow-trending-up')->chart([7, 5, 10, 3, 19, 4, 1])
            ->color('danger')
                ->icon('heroicon-o-clock'),

            Stat::make('مناوبات مكتملة هذا الشهر', $completedThisMonth)
                ->description('ضمن الشهر الحالي')->descriptionIcon('heroicon-m-arrow-trending-up')->chart([0, 2, 18, 3, 12, 4, 2])
            ->color('info')
                ->icon('heroicon-o-calendar-days'),
        ];
    }
}