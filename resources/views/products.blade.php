<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>V.M. Agri Exim</title>
    <meta name="keywords" content="{{ $keywords ?? 'default,keywords' }}">
    <meta name="description" content="{{ $descriptions ?? 'Default Description' }}">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Gp
    * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
    * Updated: Jun 29 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        .alert.alert-danger,
        .alert.alert-success {
            opacity: 0;
            animation: slideIn 0.5s forwards;
            font-weight: 700;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .overlay {
            position: absolute;
            bottom: -70px;
            left: 0;
            right: 0;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            transition: bottom 0.3s ease;
        }

        .position-relative:hover .overlay {
            bottom: 0;
        }

        .product-name {
            margin: 10px;
            font-size: 25px;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body class="portfolio-details-page">

    @include("header")

    <main class="main mt-5">

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Products</h2>
                <p>Our Products</p>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4 mb-4">
                        <a href="{{ url('product-details', $product->id) }}">
                            <div class="h-100 position-relative" style="border-radius: 10px; overflow: hidden; box-shadow: 0 0px 8px rgba(0, 0, 0, 0.2);">
                                <img src="{{ asset('images/products/' . $product->bg_image) }}" class="card-img-top img-fluid" alt="{{ $product->name }} image" style="height: 300px; width: 100%;">
                                <div class="overlay">
                                    <p class="product-name">{{ $product->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </section>

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
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>