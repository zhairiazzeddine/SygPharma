

@extends('layouts.meditrust')
@section('title', 'الصفحة غير موجودة')

@section('content')
    <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> الرئيسية</a></li>
            <li class="breadcrumb-item active current">404</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>404</h1>
        <p>الصفحة التي تطلبونها غير متوفرة حاليا</p>
      </div>
    </div><!-- End Page Title -->

    <!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="text-center">
          <div class="error-icon mb-4" data-aos="zoom-in" data-aos-delay="200">
            <i class="bi bi-exclamation-circle"></i>
          </div>

          <h1 class="error-code mb-4" data-aos="fade-up" data-aos-delay="300">404</h1>

          <h2 class="error-title mb-3" data-aos="fade-up" data-aos-delay="400">عذرا! الصفحة غير متوفرة</h2>

          <p class="error-text mb-4" data-aos="fade-up" data-aos-delay="500">
            قد تكون الصفحة التي تبحث عنها قد تمت إزالتها، أو تم تغيير اسمها، أو أنها غير متاحة مؤقتًا.
          </p>

          <div class="search-box mb-4" data-aos="fade-up" data-aos-delay="600">
            <form action="#" class="search-form">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for pages..." aria-label="Search">
                <button class="btn search-btn" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div>

          <div class="error-action" data-aos="fade-up" data-aos-delay="700">
            <a href="/" class="btn btn-primary">عودة للرئيسية</a>
          </div>
        </div>

      </div>

    </section><!-- /Error 404 Section -->

  </main>

@endsection