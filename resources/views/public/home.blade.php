@extends('layouts.meditrust')
@section('title', 'الرئيسية')
@section('content')

 <main class="main">

    <!-- Hero Section -->
    
    <section id="hero" class="hero section dark-background">
      <div class="container-fluid p-0">
        
        <div class="hero-wrapper">
          <div class="hero-image">
            <img src="{{ asset('frontend/meditrust/assets/img/health/Back.jpg') }}" alt="Advanced Healthcare" class="img-fluid">

          </div>

          <div class="hero-content">
            <div class="container">
              <div class="row">
                <div class="col-lg-7 col-md-10" data-aos="fade-right" data-aos-delay="100">
                  <div class="content-box">
                    <span class="badge-accent animate__animated animate__backInDown" data-aos="fade-up" data-aos-delay="150">سيدي_يحيى_الغرب#</span>
                    <h1 class="animate__animated animate__backInLeft animate__delay-2s" data-aos="fade-up" data-aos-delay="200">كاتقلب على شي فرماسيان فاتح دابا ؟ </h1>
                    <p class="animate__animated animate__backInRight animate__delay-3s" data-aos="fade-up" data-aos-delay="250">مرحبا بيك نتا فالمكان الصحيح موقعنا الالكتروني كيقدم ليكم خدمات عدة بخصوص كل ما يتعلق بالمنشآت و المراكز الصحية و الصيدليات و زيد و زيد </p>

                    <div class="cta-group" data-aos="fade-up" data-aos-delay="300">
                      <a href="#Pharmacies" class="animate__animated animate__bounceInUp animate__delay-4s btn btn-primary">الصيدليات المفتوحة الأن</a>
                      <a href="#Pharmacies" class=" animate__animated animate__bounceInUp animate__delay-5s btn btn-outline">صيدليات الحراسة اليوم</a>
                    </div>

                    <div class="info-badges" data-aos="fade-up" data-aos-delay="350">
                      <div class="animate__animated animate__fadeIn animate__delay-7s badge-item">
                        <i class="bi bi-telephone-fill"></i>
                        <div class="badge-content">
                          <span>SOS خط الطوارئ</span>
                          <strong>+212 (620) 068-6868</strong>
                        </div>
                      </div>
                      <div class="animate__animated animate__fadeIn animate__delay-8s badge-item">
                        <i class="bi bi-clock-fill"></i>
                        <div class="badge-content">
                          <span>ساعات العمل</span>
                          <strong>24h/24h et 7j/7j</strong>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="features-wrapper">
                <div class="row gy-4">

                  <div class="col-lg-4">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="450">
                      <div class="feature-icon">
                        <i class="bi bi-hand-index"></i>
                      </div>
                      <div class="feature-text">
                        <h3>كليكي</h3>
                        <p>يمكن ليكم تبحتو على أقرب صيدلية ليكم مفتوحة</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                      <div class="feature-icon">
                        <i class="bi bi-geo-alt"></i>
                      </div>
                      <div class="feature-text">
                        <h3>تبع الطراجي</h3>
                        <p>اطلعو على أقصر طريق ليها</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="550">
                      <div class="feature-icon">
                        <i class="bi bi-capsule"></i>
                      </div>
                      <div class="feature-text">
                        <h3>صيدلية في الخدمة</h3>
                        <p>الصيدلية تستقبل طلباتكم</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      
    </section><!-- /Hero Section -->

    <!-- Home About Section -->
    <section id="home-about" class="home-about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5 align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="about-image">
              <img src="{{ asset('frontend/meditrust/assets/img/health/facilities-1.jpeg') }}" alt="Modern Healthcare Facility" class="img-fluid rounded-3 mb-4">
              <div class="experience-badge">
                <span class="years">25+</span>
                <span class="text">سنوات من التميز</span>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <h2>متوفر على مدار الساعة طوال أيام الأسبوع، يمكنك بسهولة العثور على أقرب صيدلية.</h2>
              <p class="lead">الصيدليات المناوبة: خدمة مستمرة على مدار الساعة لتلبية الحالات المستعجلة</p>

              <p>بغض النظر عن الوقت أو اليوم، يمكنك العثور على صيدلية مناوبة مفتوحة طوال أيام الأسبوع، وأيام الأحد، والعطلات الرسمية، وحتى في الليل. تتيح هذه الخدمة للجمهور تلبية احتياجاتهم العاجلة خارج ساعات عمل الصيدليات الرسمية. ويمكن تمييز صيدلية المناوبة من خلال الصليب الأخضر الذي يظل مضاءً طوال ساعات عملها.</p>

             

              <div class="cta-wrapper mt-4">
                <a href="#" class="btn btn-primary">اعرف المزيد عنا</a>
                <a href="#" class="btn btn-outline">تعرف على فريقنا</a>
              </div>
            </div>
          </div>
        </div>

       
      </div>

    </section><!-- /Home About Section -->

    

   
<!-- /اخر تغيير find a doctor -->
   
   <section id="Pharmacies" class="find-a-doctor section">
    <div class="container" data-aos="fade-up">

        <!-- Section Title -->
        <div class="section-title">
            <h2>الصيدليات</h2>
            <p>يمكنكم من خلال هذا القسم الإطلاع على الصيدليات في حالة خدمة و صيدليات المداومة اليوم</p>
        </div>

        <div class="services" data-aos="fade-up" data-aos-delay="100">
            <div class="services-tabs">

                {{-- Tabs --}}
                <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="200">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="openPharmacies-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#openPharmacies"
                            type="button"
                            role="tab"
                        >
                            الصيدليات المفتوحة حاليا
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="dutyPharmacies-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#dutyPharmacies"
                            type="button"
                            role="tab"
                        >
                            صيدليات الحراسة اليوم
                        </button>
                    </li>
                </ul>

                {{-- Tab Content --}}
                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                    {{-- 🟢 الصيدليات المفتوحة حالياً --}}
                    <div class="tab-pane fade show active" id="openPharmacies" role="tabpanel">
                        <div class="row g-4">

                            @php
                                // إذا صيدلية واحدة فقط، خليها تأخذ الـ container كامل
                                $openColClass = $openPharmacies->count() === 1 ? 'col-12' : 'col-lg-6';
                            @endphp

                            @forelse($openPharmacies as $p)
                                <div class="{{ $openColClass }}">
                                    <div class="service-item">
                                        <div class="service-icon-wrapper">
                                            <i class="fa-solid fa-staff-snake"></i>
                                        </div>

                                        <div class="service-details">
                                            <h5>{{ $p->name }}</h5>

                                            @if ($p->duties->isNotEmpty())
                                                <p>🌙 الصيدلية مناوبة الآن</p>
                                            @else
                                                <p>🧰 الصيدلية في الخدمة الآن</p>
                                            @endif

                                            <ul class="service-benefits">
                                                <li><i class="fa fa-location-arrow"></i> &nbsp; {{ $p->area?->name ?? 'غير محدد' }}</li>
                                                <li><i class="fa fa-map-marker"></i> &nbsp; {{ $p->address }}</li>
                                                <li>
                                                    <i class="fa fa-phone"></i> &nbsp;
                                                    <a href="tel:{{ $p->phone }}">{{ $p->phone }}</a>
                                                </li>
                                            </ul>

                                            <a href="#"
                                               class="service-link js-gmaps-dir"
                                               data-lat="{{ $p->latitude }}"
                                               data-lng="{{ $p->longitude }}"
                                               data-name="{{ $p->name }}">
                                                <i class="fa fa-arrow-right"></i>
                                                <span>الموقع عبر الخريطة</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center m-0">لا توجد صيدليات مفتوحة الآن.</p>
                                </div>
                            @endforelse

                        </div>
                    </div>

                    {{-- 🌙 صيدليات الحراسة اليوم --}}
                    <div class="tab-pane fade" id="dutyPharmacies" role="tabpanel">
                        <div class="row g-4">

                            @php
                                $dutyColClass = $dutyPharmacies->count() === 1 ? 'col-12' : 'col-lg-6';
                            @endphp

                            @forelse($dutyPharmacies as $p)
                                <div class="{{ $dutyColClass }}">
                                    <div class="service-item featured">
                                        <div class="service-icon-wrapper">
                                            <i class="fa-solid fa-staff-snake"></i>
                                        </div>

                                        <div class="service-details">
                                            <h5>{{ $p->name }}</h5>

                                            <p class="mb-1">🌙 صيدلية الحراسة (المداومة)</p>

                                            @if ($p->duties->isNotEmpty())
                                                @php($activeDuty = $p->duties->first())
                                                <p class="m-0">
                                                    ⏳ متبقي على نهاية المناوبة:
                                                    <strong
                                                        class="js-duty-countdown"
                                                        data-ends-at="{{ $activeDuty->ends_at->toIso8601String() }}"
                                                    >--:--:--</strong>
                                                </p>
                                            @endif

                                            <ul class="service-benefits mt-2">
                                                <li><i class="fa fa-location-arrow"></i> &nbsp; {{ $p->area?->name ?? 'غير محدد' }}</li>
                                                <li><i class="fa fa-map-marker"></i> &nbsp; {{ $p->address }}</li>
                                                <li>
                                                    <i class="fa fa-phone"></i> &nbsp;
                                                    <a href="tel:{{ $p->phone }}">{{ $p->phone }}</a>
                                                </li>
                                            </ul>

                                            <a href="#"
                                               class="service-link js-gmaps-dir"
                                               data-lat="{{ $p->latitude }}"
                                               data-lng="{{ $p->longitude }}"
                                               data-name="{{ $p->name }}">
                                                <i class="fa fa-arrow-right"></i>
                                                <span>الموقع عبر الخريطة</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center m-0">لا توجد صيدليات حراسة اليوم.</p>
                                </div>
                            @endforelse

                        </div>
                    </div>

                </div> {{-- /.tab-content --}}
            </div> {{-- /.services-tabs --}}
        </div> {{-- /.services --}}

    </div> {{-- /.container --}}
</section>

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">صحتكم هي أولويتنا</h2>
            <p data-aos="fade-up" data-aos-delay="250">في حالة الطوارئ الطبية أو الحاجة إلى الرعاية المنزلية، ثق في Omnidoc Santé للحصول على سيارة إسعاف واستشارة SOS Médecin على مدار الساعة طوال أيام الأسبوع، في أي مكان في المغرب.</p>

           
          </div>
        </div>

       

        <div class="emergency-alert" data-aos="zoom-in" data-aos-delay="500">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <div class="emergency-content">
                
                <div class="emergency-text">
                  <h4>الطوارئ الطبية؟</h4>
                  <p>اتصل بخط الطوارئ المتاح على مدار الساعة طوال أيام الأسبوع للحصول على مساعدة فورية</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 text-end">
              <a href="tel:150" class="emergency-btn">
                <i class="bi bi-telephone-fill"></i>&nbsp;
                إتصل 150
              </a>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Emergency Info Section -->
    <section id="emergency-info" class="emergency-info section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>رقم الطوارئ الوطني</h2>
        <p>يقدم سامو خدمات الاستشارة المنزلية للمرضى الذين يحتاجون إلى تدخلات طبية أو بسيطة</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">

            <!-- Emergency Alert Banner -->
            <div class="emergency-alert" data-aos="zoom-in" data-aos-delay="100">
              <div class="alert-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
              </div>
              <div class="alert-content">
                <h3>Allô SAMU</h3>
                <p>رقم الطوارئ الوطني لخدمة الإسعاف الطبي الطارئ في المغرب هو 141. هذه الخدمة متاحة على مدار الساعة طوال أيام الأسبوع لحالات الطوارئ الطبية، وخاصة للأعراض الخطيرة. </p>
              </div>
              <div class="alert-action">
                <a href="tel:911" class="btn btn-emergency">
                  <i class="bi bi-telephone-fill"></i>
                  اتصل 141
                </a>
              </div>
            </div><!-- End Emergency Alert -->

            <!-- Emergency Contact Grid -->
            <div class="row emergency-contacts" data-aos="fade-up" data-aos-delay="200">

              <div class="col-md-6 mb-4">
                <div class="contact-card urgent">
                  <div class="card-icon">
                    <i class="bi bi-hospital"></i>
                  </div>
                  <div class="card-content">
                    <h4>AKDITAL : Service des Urgences</h4>
                    <p class="contact-info">
                      <i class="bi bi-telephone"></i>
                      <span>+212 (537) 036-9696</span>
                    </p>
                    <p class="address">
                      <i class="bi bi-geo-alt"></i>
                      AV Mohammed 6, Kenitra
                    </p>
                    <p class="address"> 
                      <i class="bi bi-clock"></i>
                      Lundi- Dimanche24H/24 7J/7</p>
                  </div>
                  <div class="card-action">
                    <a href="tel:0537369696" class="btn btn-contact">اتصل الأن</a>
                  </div>
                </div>
              </div><!-- End Emergency Room Card -->

              <div class="col-md-6 mb-4">
                <div class="contact-card">
                  <div class="card-icon">
                    <i class="bi bi-hospital"></i>
                  </div>
                  <div class="card-content">
                    <h4>Centre Hospitalier Régional El Idrissi de Kénitra</h4>
                    <p class="contact-info">
                      <i class="bi bi-telephone"></i>
                      <span>+212 (537) 320-8652</span>
                    </p>
                    <p class="address">
                      <i class="bi bi-geo-alt"></i>
                      AV Mohammed 6, Kenitra (56CXC+7F Kénitra)
                    </p>
                    <p class="address">
                      <i class="bi bi-clock"></i>
                      Lundi- Dimanche24H/24 7J/7</p>
                  </div>
                  <div class="card-action">
                    <a href="tel:0537320865" class="btn btn-contact">اتصل الأن</a>
                  </div>
                </div>
              </div><!-- End Urgent Care Card -->

              

            </div><!-- End Emergency Contacts -->

            <!-- Quick Actions -->
           

            <!-- Emergency Preparation Tips -->
            <div class="emergency-tips" data-aos="fade-up" data-aos-delay="400">
              <h4>متى يجب طلب الرعاية الطارئة</h4>
              <div class="row">
                <div class="col-md-6">
                  <ul class="emergency-list">
                    <li><i class="bi bi-check-circle"></i> ألم في الصدر أو صعوبة في التنفس</li>
                    <li><i class="bi bi-check-circle"></i> ردود فعل تحسسية شديدة</li>
                    <li><i class="bi bi-check-circle"></i> صدمة أو إصابات كبيرة</li>
                    <li><i class="bi bi-check-circle"></i> علامات السكتة الدماغية أو النوبة القلبية</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="emergency-list">
                    <li><i class="bi bi-check-circle"></i> حروق شديدة أو نزيف</li>
                    <li><i class="bi bi-check-circle"></i> فقدان الوعي</li>
                    <li><i class="bi bi-check-circle"></i> ألم شديد في البطن</li>
                    <li><i class="bi bi-check-circle"></i> ارتفاع في درجة الحرارة مع الارتباك</li>
                  </ul>
                </div>
              </div>
            </div><!-- End Emergency Tips -->

          </div>
        </div>

      </div>

    </section><!-- /Emergency Info Section -->

  </main>

@endsection
