<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Services\DutyResolverService;
use Illuminate\View\View;

final class PharmacyController extends Controller
{
    public function index(DutyResolverService $resolver)
{
    $now = now(config('app.timezone'));

    return view('public.home', [
        'openPharmacies' => $resolver->openNow($now),
        'dutyPharmacies' => $resolver->dutyToday($now),
        'now' => $now,
    ]);
}


    public function map(DutyResolverService $resolver): View
    {
        
         $pharmacies = $resolver
        ->resolve(now(config('app.timezone')))
        ->map(function ($p) {
            return [
                'name' => $p->name,
                // 👇 تأكد أن هذه الأسماء موجودة فعلًا في DB
                'lat' => is_numeric($p->latitude) ? (float) $p->latitude : null,
                'lng' => is_numeric($p->longitude) ? (float) $p->longitude : null,
                'address' => $p->address,
            ];
        })
        ->filter(fn ($p) => ! is_null($p['lat']) && ! is_null($p['lng']))
        ->values();

    return view('public.map', [
        'pharmacies' => $pharmacies,
    ]);
    }
}
