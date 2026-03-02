  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        

        <h1 class="sitename">SygPharma</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('public.home')}}" class="{{ request()->route()->named('public.home') ? 'active' : '' }}">الرئيسية</a></li>
          <li><a href="#">حول الموقع</a></li>
          <li><a href="#">الأطباء</a></li>
          <li><a href="#">مختبرات</a></li>
          <li><a href="#">أطباء الأسنان</a></li>
          <!-- <li class="dropdown"><a href="#"><span>عيادات</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
               <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="department-details.html">Department Details</a></li>
              <li><a href="service-details.html">Service Details</a></li>
              <li><a href="appointment.html">Appointment</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
              <li><a href="faq.html">Frequently Asked Questions</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="terms.html">Terms</a></li>
              <li><a href="privacy.html">Privacy</a></li>
              <li><a href="404.html">404</a></li>
            </ul>
          </li>
           -->
          <li><a href="{{route('public.formulaire')}}" class="{{ request()->route()->named('public.formulaire') ? 'active' : '' }}">استمارة التسجيل</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#">حجز موعد</a>

    </div>
  </header>
