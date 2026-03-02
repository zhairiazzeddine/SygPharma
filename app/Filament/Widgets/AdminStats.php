<?php

namespace App\Filament\Widgets;

use App\Models\Duty;
use App\Models\Pharmacy;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class AdminStats extends StatsOverviewWidget
{
    protected ?string $heading = 'إحصائيات المدينة';

    public static function canView(): bool
    {
        $user = auth()->user();

        return $user && $user->role === 'super_admin';
    }

    protected function getStats(): array
    {
        $totalPharmacies = Pharmacy::count();

        $activePharmacies = Pharmacy::where('is_active', true)->count();

        $totalPharmacists = User::where('role', 'pharmacist')->count();

        $today = now()->toDateString();

        $dutiesToday = Duty::whereDate('starts_at', $today)->count();

        return [
            Stat::make('إجمالي الصيدليات', $totalPharmacies)
                ->description('كل الصيدليات المسجلة')
                ->icon('heroicon-o-building-storefront')->descriptionIcon('heroicon-m-arrow-trending-up') ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),

            Stat::make('الصيدليات المفعّلة', $activePharmacies)
                ->description('قيد الخدمة في النظام')
                ->icon('heroicon-o-check-badge')->descriptionIcon('heroicon-m-arrow-trending-up')->chart([7, 5, 10, 3, 19, 4, 1])
            ->color('danger'),

            Stat::make('عدد الصيادلة في النظام', $totalPharmacists)
                ->icon('heroicon-o-user-group')->descriptionIcon('heroicon-m-arrow-trending-up')->chart([11, 5, 15, 3, 6, 4, 17])
            ->color('primary'),

            Stat::make('مناوبات اليوم', $dutiesToday)
                ->description('مناوبات تبدأ اليوم')->descriptionIcon('heroicon-m-arrow-trending-up')->chart([0, 2, 18, 3, 12, 4, 2])
            ->color('info')
                ->icon('heroicon-o-calendar-days'),
        ];
    }
}