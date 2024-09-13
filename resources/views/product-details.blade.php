<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Product Details - Gp Bootstrap Template</title>
  <meta name="keywords" content="{{ $keywords ?? 'default,keywords' }}">
  <meta name="description" content="{{ $descriptions ?? 'Default Description' }}">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <style>
    .swiper-slide {
      width: 100%;
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      width: 100%;
      height: 100%;
    }
  </style>

  <!-- =======================================================
  * Template Name: Gp
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="portfolio-details-page">

  @include("header")

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container" style="margin-top: 6rem; margin-bottom: -35px;">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-12">
            <div class="container section-title" data-aos="fade-up">
              <h2>Products</h2>
              <p>Product Details</p>
            </div><!-- End Section Title -->
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li><a href="/products">Product</a></li>
            <li class="current">Product Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Product Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="{{ asset('images/products/' . $products->bg_image) }}" alt="">
                </div>
                @if($products->other_image)
                @foreach(explode(',', $products->other_image) as $image)
                @php
                $image = trim(str_replace(['"', '[', ']'], '', $image));
                @endphp
                <div class="swiper-slide">
                  <img src="{{ asset('images/products/' . $image) }}" alt="">
                </div>
                @endforeach
                @endif
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>{{ $products->name }}({{ $products->product_hs_code }})</h3>
              <div class="share-post">
                <h5>Share this post:</h5>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&title={{ urlencode($products->title) }}" target="_blank" class="btn btn-outline-primary btn-sm me-1">
                  <i class="bi bi-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($products->title) }}&url={{ urlencode(url()->current()) }}&via=YourTwitterHandle" target="_blank" class="btn btn-outline-info btn-sm me-1">
                  <i class="bi bi-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($products->title) }}&summary={{ urlencode($products->description) }}" target="_blank" class="btn btn-outline-secondary btn-sm me-1">
                  <i class="bi bi-linkedin"></i>
                </a>
                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&media={{ asset('images/products/' . $products->bg_image) }}&description={{ urlencode($products->title) }}" target="_blank" class="btn btn-outline-danger btn-sm me-1">
                  <i class="bi bi-pinterest"></i>
                </a>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($products->title) }}%20{{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                  <i class="bi bi-whatsapp"></i>
                </a>

              </div>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <p>
                {!! nl2br(preg_replace('/((?:\S+\s+){15}\S+)(?=\s|$)/', '$1<br>', $products->description)) !!}
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Product Details Section -->

  </main>
  <!-- Bottom Header for Mobile -->
  <div class="bottom-header d-md-none">
    <nav class="nav-menu">
      <div class="nav-item">
        <a href="/certificate" class="nav-link">
          <i class="bi bi-award"></i>
          Certificate
        </a>
      </div>
      <div class="nav-item">
        <a href="/about" class="nav-link">
          <i class="bi bi-info-circle"></i>
          About
        </a>
      </div>
      <div class="nav-item home-item">
        <a href="/" class="nav-link">
          <i class="bi bi-house-door"></i>
          Home
        </a>
      </div>
      <div class="nav-item">
        <a href="/products" class="nav-link">
          <i class="bi bi-box"></i>
          Products
        </a>
      </div>
      <div class="nav-item">
        <a href="/contact" class="nav-link">
          <i class="bi bi-envelope"></i>
          Contact
        </a>
      </div>
    </nav>
  </div>

  @include("footer")

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>