@extends('public.layout')

@section('content')
<h1>الصيدليات المفتوحة الآن</h1>

<p>الوقت الحالي: {{ $now->format('H:i') }}</p>

@if ($pharmacies->isEmpty())
    <p>لا توجد صيدليات مفتوحة حاليًا</p>
@endif

@foreach ($pharmacies as $pharmacy)
    <div class="pharmacy">
        <strong>{{ $pharmacy->name }}</strong><br>
        {{ $pharmacy->address }}<br>
        {{ $pharmacy->phone }}
    </div>
@endforeach

<a href="{{ route('public.map') }}">عرض الخريطة</a>
@endsection
