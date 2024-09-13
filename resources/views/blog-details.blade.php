<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>V.M. Agri Exim</title>
    <meta name="keywords" content="{{ $keywords ?? 'default,keywords' }}">
    <meta name="description" content="{{ $descriptions ?? 'Default Description' }}">

    <!-- Favicons -->
    <link href="/assets/img/logo.png" rel="icon">
    <link href="/assets/img/logo.png" rel="apple-touch-icon">

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
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

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

        .comments-list {
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .comment-item {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #f1f1f1;
            border-radius: 5px;
        }

        .comment-author {
            font-weight: bold;
        }

        .comment-date {
            font-size: 0.9em;
            color: #888;
            margin-left: 10px;
        }

        .comment-text {
            margin-top: 5px;
        }

        #submit-comment {
            background-color: #353637;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transform: scale(1.05);
        }

        #submit-comment:hover {
            background-color: #353637;
            color: white;
            transition: 0.3s;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btnbox {
            border-right: 1px solid #ccced1;
            border-bottom: 1px solid #ccced1;
            border-left: 1px solid #ccced1;
        }
    </style>
</head>

<body class="portfolio-details-page">

    @include("header")

    <main class="main mt-5">

        <!-- Blog Details Section -->
        <section id="blog-details" class="blog-details section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Import-Export Insights</h2>
                <p>{{ $blog->title }}</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('images/blog/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 400px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{!! $blog->content !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <h4>Latest Industry News</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ $blog->id }}">{{ $blog->title }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tags and Share Section -->
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Tags:</h5>
                        <span class="badge bg-secondary me-1">{{ $blog->name }}</span>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h5>Share:</h5>
                        <a href="#" class="btn btn-outline-primary btn-sm me-1"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn btn-outline-info btn-sm me-1"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="btn btn-outline-secondary btn-sm me-1"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm me-1"><i class="bi bi-pinterest"></i></a>
                        <a href="#" class="btn btn-outline-success btn-sm"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="container mt-4">
                <form action="/insert-comment" method="post">
                    @csrf
                    <textarea class="form-control" id="content" name="content" placeholder="Write your comment here..." style="resize: none;"></textarea>
                    <!-- error message -->
                    @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="text-end btnbox">
                        <button class="btn btn-primary" id="submit-comment">Comment</button>
                    </div>
                </form>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#content'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>

            <div class="container mt-4">
                <h4>Comments</h4>
                <div class="comments-list" style="max-height: 27rem; overflow-y: auto;">
                    <div class="comment-item">
                        <div class="comment-author">
                            <strong>John Doe</strong>
                            <span class="comment-date">March 10, 2024</span>
                        </div>
                        <p class="comment-text">This is a great blog post! I learned a lot about the topic.</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-author">
                            <strong>Jane Smith</strong>
                            <span class="comment-date">March 11, 2024</span>
                        </div>
                        <p class="comment-text">I found this information very useful. Thank you for sharing!</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-author">
                            <strong>Mike Johnson</strong>
                            <span class="comment-date">March 12, 2024</span>
                        </div>
                        <p class="comment-text">Interesting perspective! I would love to read more about this.</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-author">
                            <strong>Emily Davis</strong>
                            <span class="comment-date">March 13, 2024</span>
                        </div>
                        <p class="comment-text">Great insights! Looking forward to more posts.</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-author">
                            <strong>Chris Lee</strong>
                            <span class="comment-date">March 14, 2024</span>
                        </div>
                        <p class="comment-text">This was very helpful, thank you!</p>
                    </div>
                    <div class="comment-item">
                        <div class="comment-author">
                            <strong>Anna Brown</strong>
                            <span class="comment-date">March 15, 2024</span>
                        </div>
                        <p class="comment-text">I appreciate the detailed information provided.</p>
                    </div>
                </div>
            </div>

        </section><!-- /Blog Details Section -->

    </main>

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

    <!-- Disqus Script -->
    <script>
        var disqus_config = function() {
            this.page.url = "{{ url()->current() }}";
            this.page.identifier = "blog-{{ $blog->id }}";
        };
        (function() {
            var d = document,
                s = d.createElement('script');
            s.src = 'https://YOUR-DISQUS-SHORTNAME.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

</body>

</html>