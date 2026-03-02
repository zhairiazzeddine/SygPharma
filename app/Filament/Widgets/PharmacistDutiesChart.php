<?php

namespace App\Filament\Widgets;

use App\Models\Duty;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;

final class PharmacistDutiesChart extends ChartWidget
{
    // عنوان الودجت فوق الرسم
    protected ?string $heading = 'مناوبات آخر 30 يومًا';

    // نوع الرسم: 'line' أو 'bar' أو غيرها (حسب ذوقك)
    protected function getType(): string
    {
        return 'bar';
    }

    public static function canView(): bool
    {
        $user = auth()->user();

    return $user && $user->role === 'pharmacist';
    }

    protected function getData(): array
    {
        $user = auth()->user();
        $pharmacyId = $user->pharmacy_id ?? null;

        if (! $pharmacyId) {
            // لا توجد صيدلية مرتبطة بالمستخدم → نرجّع بيانات فارغة
            return [
                'datasets' => [
                    [
                        'label' => 'عدد المناوبات',
                        'data' => [],
                    ],
                ],
                'labels' => [],
            ];
        }

        $to = now()->endOfDay();
        $from = now()->subDays(29)->startOfDay();

        // نجلب عدد المناوبات لكل يوم
        $duties = Duty::query()
            ->selectRaw('DATE(starts_at) as date, COUNT(*) as total')
            ->where('pharmacy_id', $pharmacyId)
            ->whereBetween('starts_at', [$from, $to])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labels = [];
        $data = [];

        // نملأ كل الأيام في الفترة حتى لو بدون مناوبة (0)
        $period = CarbonPeriod::create($from, $to);

        foreach ($period as $date) {
            $key = $date->toDateString();      // 2026-02-22
            $labels[] = $date->format('d/m');  // 22/02 مثلاً
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