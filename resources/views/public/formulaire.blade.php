@extends('layouts.meditrust')
@section('title', 'إستمارة التسجيل')
@section('content')
 <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> الرئيسية</a></li>
            <li>&nbsp;/&nbsp;</li>
            <li class="breadcrumb-item active current">إستمارة التسجيل</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>إستمارة التسجيل</h1>
        <p>يمكنكم التواصل مع فريقنا التقني </p>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container">
        <div class="contact-wrapper">
          <div class="contact-info-panel">
            <div class="contact-info-header">
              <h3>للإتصال بنا</h3>
              <p>فريقنا رهن إشارتكم للإجابة عن جميع استفساراتكم</p>
            </div>

            <div class="contact-info-cards">
              <div class="info-card">
                <div class="icon-container">
                  <i class="bi bi-pin-map-fill"></i>
                </div>
                <div class="card-content">
                  <h4>موقعنا</h4>
                  <p>SIDI YAHIA DU GHARB</p>
                </div>
              </div>

              <div class="info-card">
                <div class="icon-container">
                  <i class="bi bi-envelope-open"></i>
                </div>
                <div class="card-content">
                  <h4>البريد اللإلكتروني</h4>
                  <p>zhairi.az@gmail.com</p>
                </div>
              </div>

              <div class="info-card">
                <div class="icon-container">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <div class="card-content">
                  <h4>خط الإتصال المباشر</h4>
                  <p>0673723090</p>
                </div>
              </div>

              <div class="info-card">
                <div class="icon-container">
                  <i class="bi bi-clock-history"></i>
                </div>
                <div class="card-content">
                  <h4>ساعات العمل</h4>
                  <p>من الإثنين إلى السبت: من الساعة 9 صباحاً حتى 7 مساءً</p>
                </div>
              </div>
            </div>

            <div class="social-links-panel">
              <h5>Follow Us</h5>
              <div class="social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="contact-form-panel">
            

            <div class="form-container">
              <h3>إتصل بنا</h3>
              <p>طبقا لمقتضيات القانون 08-09، تمتلك -بصفتك مستعمل الموقع- حق الاطلاع على بياناتك المسجلة وتعديلها. وقد تم التصريح بمعالجة هذه البيانات لدى اللجنة الوطنية لمراقبة حماية المعطيات ذات الطابع الشخصي</p>

              <form action="forms/contact.php" method="post" class="php-email-form">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nameInput" name="name" placeholder="Full Name" required="">
                  <label for="nameInput">الإسم الكامل</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email Address" required="">
                  <label for="emailInput">البريد الإلكتروني</label>
                </div>

                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="subjectInput" name="subject" placeholder="Subject" required="">
                  <label for="subjectInput">الموضوع</label>
                </div>

                <div class="form-floating mb-3">
                  <textarea class="form-control" id="messageInput" name="message" rows="5" placeholder="Your Message" style="height: 150px" required=""></textarea>
                  <label for="messageInput">الرسالة</label>
                </div>

                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div style="direction:ltr;" class="g-recaptcha" data-sitekey="6LePfnIsAAAAAB4I8Vs0eXD-T5R2ucX6HjFKq5NJ"></div><BR></BR>

                <div class="d-grid">
                  <button type="submit" class="btn-submit">إرسال <i class="bi bi-send-fill ms-2"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>

@endsection
