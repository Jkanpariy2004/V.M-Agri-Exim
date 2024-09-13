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

        @media (max-width: 767px) {
            .bottom-header {
                position: fixed;
                bottom: -1px;
                left: 0;
                right: 0;
                background-color: #fff;
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
                z-index: 1000;
            }

            .bottom-header .nav-menu {
                display: flex;
                justify-content: space-around;
            }

            .bottom-header .nav-item {
                text-align: center;
                height: 80px;
            }

            .bottom-header .nav-link {
                display: flex;
                flex-direction: column;
                align-items: center;
                color: #333;
                font-size: 12px;
            }

            .bottom-header .nav-link i {
                font-size: 20px;
                margin-bottom: 5px;
            }

            main {
                padding-bottom: 70px;
            }

            .home-item {
                position: relative;
                top: -20px;
                background-color: #fff;
                border-radius: 50%;
                padding: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }
        }

        .title {
            margin-bottom: -5rem;
        }
    </style>
</head>

<body class="portfolio-details-page">

    @include("header")

    <main class="main mt-5">

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container section-title title" data-aos="fade-up">
                <h2>Certificates</h2>
                <p>Our Certifications and Accreditations</p>
            </div>

            <div class="container project py-5 mb-5">
                <div class="row">
                    <?php

                    use App\Models\certificate;

                    $certificates = certificate::all();
                    ?>
                    @foreach($certificates as $certificate)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".2s">
                        <div class="project-item">
                            <div class="project-img">
                                <img src="{{ asset('images/certificates/' . $certificate->certificate_image) }}" class="img-fluid w-100 rounded certificate-image" alt="{{ $certificate->certificate_name }}" style="cursor: pointer; width: 100%; height: 300px;" data-bs-toggle="modal" data-bs-target="#certificateModal{{ $loop->index }}">
                                <div class="project-content">
                                    <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#certificateModal{{ $loop->index }}">
                                        <h4 class="text-secondary">{{ $certificate->certificate_name }}</h4>
                                        <p class="m-0 text-white">{{ $certificate->certificate_description }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="certificateModal{{ $loop->index }}" tabindex="-1" aria-labelledby="certificateModalLabel{{ $loop->index }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="certificateModalLabel{{ $loop->index }}">{{ $certificate->certificate_name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('images/certificates/' . $certificate->certificate_image) }}" class="img-fluid" alt="{{ $certificate->certificate_name }}" style="max-height: 90vh; max-width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    @include("footer")

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <style>

    </style>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });

            var certificateImages = document.querySelectorAll('.certificate-image');
            certificateImages.forEach(function(img) {
                img.style.cursor = 'pointer';
            });
        });
    </script>

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

</body>

</html>