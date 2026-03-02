<?php

namespace App\Filament\Widgets;

use App\Models\Duty;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

final class TopPharmaciesByDutiesChart extends ChartWidget
{
    protected ?string $heading = 'الصيدليات الأكثر مناوبة';

    protected function getType(): string
    {
        return 'bar'; // تقدر تخليها 'horizontalBar' أو 'line' حسب ذوقك
    }

    public static function canView(): bool
    {
        $user = auth()->user();

        return $user && $user->role === 'super_admin';
    }

    protected function getData(): array
    {
        // نجلب أكثر الصيدليات مناوبة (مثلاً أعلى 7)
        $rows = Duty::query()
            ->join('pharmacies', 'duties.pharmacy_id', '=', 'pharmacies.id')
            ->groupBy('pharmacies.id', 'pharmacies.name')
            ->select([
                'pharmacies.name as pharmacy_name',
                DB::raw('COUNT(duties.id) as total_duties'),
            ])
            ->orderByDesc('total_duties')
            ->limit(7)
            ->get();

        $labels = $rows->pluck('pharmacy_name')->all();
        $data   = $rows->pluck('total_duties')->map(fn ($v) => (int) $v)->all();

        return [
            'datasets' => [
                [
                    'label' => 'عدد المناوبات',
                    'data'  => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }
}