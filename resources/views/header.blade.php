<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">VMAE</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="{{Request::is('/') ? 'active' : '' }}">Home<br></a></li>
                <li><a href="/about" class="{{Request::is('about') ? 'active' : '' }}">About</a></li>
                <li>
                    <a href="/products" class="{{ Request::is('products') || Request::segment(1) == 'product-details' ? 'active' : '' }}">
                        Products
                    </a>
                </li>
                <li>
                    <a href="/blog" class="{{ Request::is('blog') || Request::segment(1) == 'blog-details' ? 'active' : '' }}">
                        Blog
                    </a>
                </li>
                <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> -->
                <li><a href="/certificate" class="{{Request::is('certificate') ? 'active' : '' }}">Certificate</a></li>
                <li><a href="/contact" class="{{Request::is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="d-none d-xl-flex flex-shirink-0">
            <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                <a href="tel:+919712101878" class="position-relative animated tada infinite">
                    <i class="fa fa-phone-alt text-white fa-2x"></i>
                    <div class="position-absolute" style="top: -7px; left: 20px;">
                        <span><i class="fa fa-comment-dots" style="color: white;"></i></span>
                    </div>
                </a>
            </div>
            <div class="d-flex flex-column pe-4">
                <span class="text-50" style="color: white;">Have any questions?</span>
                <span class="" style="color: white;">Call: +91 97121 01878</span>
            </div>
            <!-- <div class="d-flex align-items-center justify-content-center ms-4 ">
                <a href="#"><i class="bi bi-search text-white fa-2x"></i> </a>
            </div> -->
        </div>
    </div>
</header>