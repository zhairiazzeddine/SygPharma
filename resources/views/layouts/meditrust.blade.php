<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SygPharma - @yield('title')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('frontend/meditrust/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('frontend/meditrust/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/meditrust/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/meditrust/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/meditrust/assets/vendor/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('frontend/meditrust/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/meditrust/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/meditrust/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('frontend/meditrust/assets/css/main.css') }}" rel="stylesheet">

</head>
<body>

@include('partials.header')

<main id="main">
    @yield('content')
</main>

@include('partials.footer')

<!-- MediTrust JS -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/meditrust/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/meditrust/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('frontend/meditrust/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/meditrust/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontend/meditrust/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/meditrust/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/meditrust/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/meditrust/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('frontend/meditrust/assets/js/main.js') }}"></script>

  <script>
(function () {
  function openGoogleMapsDirections(originLat, originLng, destLat, destLng) {
    // Google Maps Directions URL (بدون API Key)
    const url =
      'https://www.google.com/maps/dir/?api=1' +
      '&origin=' + encodeURIComponent(originLat + ',' + originLng) +
      '&destination=' + encodeURIComponent(destLat + ',' + destLng) +
      '&travelmode=walking';
    window.open(url, '_blank', 'noopener,noreferrer');
  }

  function openGoogleMapsDestinationOnly(destLat, destLng) {
    // fallback: بدون origin
    const url =
      'https://www.google.com/maps/search/?api=1' +
      '&query=' + encodeURIComponent(destLat + ',' + destLng);
    window.open(url, '_blank', 'noopener,noreferrer');
  }

  document.querySelectorAll('.js-gmaps-dir').forEach(function (el) {
        el.addEventListener('click', function (e) {
            e.preventDefault();

            const lat  = this.dataset.lat;
            const lng  = this.dataset.lng;
            const name = this.dataset.name || '';

            // نص الوجهة الذي سنرسله إلى Google Maps
            // ندمج اسم الصيدلية + المدينة + الإحداثيات لتحسين الدقة
            const destinationQuery = encodeURIComponent(
                name + ' Sidi Yahya El Gharb ' + lat + ',' + lng
            );

            const url = `https://www.google.com/maps/dir/?api=1&destination=${destinationQuery}`;

            window.open(url, '_blank');
        });
 

    navigator.geolocation.getCurrentPosition(
      function (pos) {
        const originLat = pos.coords.latitude;
        const originLng = pos.coords.longitude;
        openGoogleMapsDirections(originLat, originLng, destLat, destLng);
      },
      function () {
        // المستخدم رفض الإذن أو فشل الحصول على الموقع
        openGoogleMapsDestinationOnly(destLat, destLng);
      },
      {
        enableHighAccuracy: true,
        timeout: 8000,
        maximumAge: 60000
      }
    );
  });
})();
</script>

<script>
(function () {
  function pad(n) { return String(n).padStart(2, '0'); }

  function render(el) {
    const endsAtStr = el.dataset.endsAt;
    const endsAt = new Date(endsAtStr);
    const now = new Date();

    let diffMs = endsAt - now;

    if (Number.isNaN(endsAt.getTime())) {
      el.textContent = 'Invalid time';
      return;
    }

    if (diffMs <= 0) {
      el.textContent = 'انتهت';
      return;
    }

    const totalSeconds = Math.floor(diffMs / 1000);
    const hours = Math.floor(totalSeconds / 3600);
    const minutes = Math.floor((totalSeconds % 3600) / 60);
    const seconds = totalSeconds % 60;

    el.textContent = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
  }

  function tick() {
    document.querySelectorAll('.js-duty-countdown').forEach(render);
  }

  tick();
  setInterval(tick, 1000);
})();
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<SCript>
  
</SCript>
@stack('scripts')
</body>
</html>
