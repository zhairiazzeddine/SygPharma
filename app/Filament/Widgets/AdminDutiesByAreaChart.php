<?php

namespace App\Filament\Widgets;

use App\Models\Duty;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

final class AdminDutiesByAreaChart extends ChartWidget
{
    protected ?string $heading = 'توزيع المناوبات حسب الأحياء (آخر 30 يومًا)';

    protected function getType(): string
    {
        return 'bar';
    }

    public static function canView(): bool
    {
        $user = auth()->user();

        return $user && $user->role === 'super_admin';
    }

    protected function getData(): array
    {
        $to = now()->endOfDay();
        $from = now()->subDays(29)->startOfDay();

        // نفترض:
        // duties: pharmacy_id, starts_at
        // pharmacies: id, area_id
        // areas: id, name
        $rows = Duty::query()
            ->join('pharmacies', 'duties.pharmacy_id', '=', 'pharmacies.id')
            ->join('areas', 'pharmacies.area_id', '=', 'areas.id')
            ->whereBetween('duties.starts_at', [$from, $to])
            ->groupBy('areas.id', 'areas.name')
            ->orderBy('areas.name')
            ->select([
                'areas.name as area_name',
                DB::raw('COUNT(duties.id) as total'),
            ])
            ->get();

        $labels = $rows->pluck('area_name')->all();
        $data = $rows->pluck('total')->map(fn ($v) => (int) $v)->all();

        return [
            'datasets' => [
                [
                    'label' => 'عدد المناوبات',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }
}