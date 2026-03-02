<?php

namespace App\Services;

use App\Models\Pharmacy;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class DutyResolverService
{
    public function openNow(Carbon $now): Collection
{
    $key = 'open_now_' . $now->format('YmdHi');

    return Cache::remember($key, now()->addMinutes(5), function () use ($now) {
        return Pharmacy::query()
            ->where('is_active', true)
            ->where(function ($q) use ($now) {

                // ✅ مفتوحة الآن بسبب المناوبة (ليل/عطلة/عيد/48h…)
                $q->whereHas('duties', fn ($dq) =>
                    $dq->where('starts_at', '<=', $now)
                       ->where('ends_at', '>=', $now)
                )

                // ✅ أو مفتوحة الآن بسبب الدوام العادي
                ->orWhereHas('openingHours', fn ($oq) =>
                    $oq->where('day_of_week', $now->dayOfWeek)  // ✅ 0..6
                    ->where('is_closed', false)
                    ->whereTime('opens_at', '<=', $now->toTimeString())
                    ->whereTime('closes_at', '>=', $now->toTimeString())
                );

    
            })
            ->with([
                'area:id,name',
                // نحمّل duty النشطة فقط باش نعرف في الواجهة واش هي مناوبة ولا عادي
                'duties' => fn ($dq) =>
                    $dq->select('id','pharmacy_id','starts_at','ends_at')
                       ->where('starts_at', '<=', $now)
                       ->where('ends_at', '>=', $now),
            ])
            ->select('id','area_id','name','address','phone','latitude','longitude')
            ->get();
    });
}


    public function dutyToday(Carbon $now): Collection
{
    return Pharmacy::query()
        ->where('is_active', true)
        // هنا Builder فعلاً
        ->whereHas('duties', function (Builder $q) use ($now) {
            $q->where('starts_at', '<=', $now)
              ->where('ends_at', '>=', $now);   // مناوبات نشطة الآن فقط
        })
        ->with([
            'area:id,name',

            // هنا Relation (HasMany)، وليس Builder
            'duties' => function (HasMany $q) use ($now) {
                $q->select('id', 'pharmacy_id', 'starts_at', 'ends_at')
                  ->where('starts_at', '<=', $now)
                  ->where('ends_at', '>=', $now);
            },
        ])
        ->select('id', 'area_id', 'name', 'address', 'phone', 'latitude', 'longitude')
        ->get();
}
}
