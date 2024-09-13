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
    </style>
</head>

<body class="portfolio-details-page">

    @include("header")

    <main class="main mt-5">

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <p>About V.M. Agri Exim</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="assets/img/import.jpg" class="img-fluid rounded" alt="About V.M. Agri Exim">
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <h3>Your Trusted Partner in Global Fruit and Vegetable Trade</h3>
                        <p>V.M. Agri Exim is a leading import-export company specializing in fresh fruits and vegetables. With years of experience and a commitment to quality, we connect farmers and producers with markets worldwide.</p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Premium quality produce from carefully selected farms</li>
                            <li><i class="bi bi-check-circle"></i> State-of-the-art cold chain logistics</li>
                            <li><i class="bi bi-check-circle"></i> Compliance with international food safety standards</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container mt-5" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-md-6" data-aos="fade-right">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Our Mission</h5>
                                <p class="card-text">To deliver the freshest, highest-quality fruits and vegetables to global markets while supporting sustainable farming practices and fair trade.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Our Vision</h5>
                                <p class="card-text">To become the most trusted name in international fruit and vegetable trade, known for our integrity, innovation, and commitment to excellence.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5" data-aos="fade-up">
                <h3 class="text-center mb-4">Our Products</h3>
                <div class="row gy-4">
                    <div class="col-md-4" data-aos="zoom-in">
                        <div class="product-card">
                            <img style="width:100%; height:300px; margin-bottom:10px;" src="assets/img/frutes-1.jpg" class="img-fluid" alt="Fruits">
                            <h4>Fruits</h4>
                            <p>Apples, Oranges, Mangoes, and more</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="product-card">
                            <img style="width:100%; height:300px; margin-bottom:10px;" src="assets/img/vegetables.jpg" class="img-fluid" alt="Vegetables">
                            <h4>Vegetables</h4>
                            <p>Tomatoes, Peppers, Onions, and more</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="product-card">
                            <img style="width:100%; height:300px; margin-bottom:10px;" src="assets/img/frutes-1.jpg" class="img-fluid" alt="Exotic Produce">
                            <h4>Exotic Produce</h4>
                            <p>Dragon Fruit, Passion Fruit, and more</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New content starts here -->
            <div class="container mt-5" data-aos="fade-up">
                <h3 class="text-center mb-4">Why Choose V.M. Agri Exim?</h3>
                <div class="row gy-4">
                    <div class="col-md-4" data-aos="fade-up">
                        <div class="feature-box text-center">
                            <i class="bi bi-award fs-1 text-primary mb-3"></i>
                            <h4>Quality Assurance</h4>
                            <p>We maintain strict quality control measures to ensure only the best produce reaches our customers.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-box text-center">
                            <i class="bi bi-globe fs-1 text-primary mb-3"></i>
                            <h4>Global Network</h4>
                            <p>Our extensive network of suppliers and distributors allows us to source and deliver products worldwide.</p>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-box text-center">
                            <i class="bi bi-truck fs-1 text-primary mb-3"></i>
                            <h4>Efficient Logistics</h4>
                            <p>Our advanced cold chain logistics ensure that products remain fresh from farm to destination.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5" data-aos="fade-up">
                <h3 class="text-center mb-4">Our Commitment to Sustainability</h3>
                <div class="row gy-4 align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="assets/img/Future.jpg" class="img-fluid rounded" alt="Sustainability">
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <p>At V.M. Agri Exim, we are committed to sustainable practices throughout our supply chain. We work closely with farmers to promote:</p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Organic farming methods</li>
                            <li><i class="bi bi-check-circle"></i> Water conservation techniques</li>
                            <li><i class="bi bi-check-circle"></i> Reduced use of pesticides and chemicals</li>
                            <li><i class="bi bi-check-circle"></i> Fair labor practices and community support</li>
                        </ul>
                        <p>By choosing V.M. Agri Exim, you're not just getting quality produce – you're supporting a more sustainable future for agriculture.</p>
                    </div>
                </div>
            </div>
            <!-- New content ends here -->

        </section><!-- End About Section -->


        <!-- New Certifications Section -->
        <section id="certifications" class="certifications section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Certifications</h2>
                    <p>Our Commitment to Quality and Safety</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-shield-check fs-1 text-primary"></i></div>
                            <h4><a href="">ISO 22000</a></h4>
                            <p>Certified for Food Safety Management Systems, ensuring the highest standards in our operations.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-globe fs-1 text-primary"></i></div>
                            <h4><a href="">Global G.A.P</a></h4>
                            <p>Recognized for Good Agricultural Practices, promoting safe and sustainable agriculture.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clipboard-check fs-1 text-primary"></i></div>
                            <h4><a href="">HACCP</a></h4>
                            <p>Hazard Analysis and Critical Control Points certified, ensuring food safety from production to consumption.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Certifications Section -->

        <!-- New Image Gallery Section -->
        <div class="container mt-5 mb-5" data-aos="fade-up">
            <h3 class="text-center mb-4">Our Operations</h3>
            <div class="row g-2">
                <div class="col-md-4" data-aos="zoom-in">
                    <img style="width: 100%; height:300px;" src="assets/img/warehouse.jpg" class="img-fluid rounded" alt="Warehouse">
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <img style="width: 100%; height:300px;" src="assets/img/packaging.jpg" class="img-fluid rounded" alt="Packaging">
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <img style="width: 100%; height:300px;" src="assets/img/shipping.jpg" class="img-fluid rounded" alt="Shipping">
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <img style="width: 100%; height:400px;" src="assets/img/qualitycontrol.jpg" class="img-fluid rounded" alt="Quality Control">
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <img style="width: 100%; height:400px;" src="assets/img/farm-visit.jpg" class="img-fluid rounded" alt="Farm Visit">
                </div>
            </div>
        </div>

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
    <!-- <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

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
        });
    </script>

</body>

</html>