@extends('public.layout')

@section('content')
<h1>خريطة الصيدليات المفتوحة</h1>

<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

<style>
#map {
    height: 70vh;
    width: 100%;
}
</style>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    
const pharmacies = @json($pharmacies);
console.log('PHARMACIES:', pharmacies);

const map = L.map('map').setView([34.0, -6.8], 13);

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

const bounds = [];

pharmacies.forEach(p => {
    console.log('RAW:', p);

    const lat = Number(p.lat);
    const lng = Number(p.lng);

    console.log('MARKER:', lat, lng);

    if (Number.isNaN(lat) || Number.isNaN(lng)) {
        console.warn('SKIPPED INVALID COORDS', p);
        return;
    }

    L.marker([lat, lng])
        .addTo(map)
        .bindPopup(`<strong>${p.name}</strong><br>${p.address}`);

    bounds.push([lat, lng]);
});

if (bounds.length) {
    map.fitBounds(bounds, { padding: [50, 50] });
}

// مهم جدًا أحيانًا
setTimeout(() => {
    map.invalidateSize();
}, 200);
</script>

@endsection
