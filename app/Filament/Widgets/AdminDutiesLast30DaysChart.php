<?php

namespace App\Filament\Widgets;

use App\Models\Duty;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;

final class AdminDutiesLast30DaysChart extends ChartWidget
{
    protected ?string $heading = 'مناوبات آخر 30 يومًا (على مستوى المدينة)';

    protected function getType(): string
    {
        return 'bar'; // لو تحب line بدل bar -> 'line'
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

        $duties = Duty::query()
            ->selectRaw('DATE(starts_at) as date, COUNT(*) as total')
            ->whereBetween('starts_at', [$from, $to])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $data = [];

        $period = CarbonPeriod::create($from, $to);

        foreach ($period as $date) {
            $key = $date->toDateString();
            $labels[] = $date->format('d/m');
            $data[] = (int) ($duties[$key]->total ?? 0);
        }

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