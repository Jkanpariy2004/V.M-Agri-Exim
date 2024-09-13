<header class="app-header top-bar">
    <!-- begin navbar -->
    <nav class="navbar navbar-expand-md">

        <!-- begin navbar-header -->
        <div class="navbar-header d-flex align-items-center">
            <a class="navbar-brand" href="/admin-dashboard">
                <img src="/admin_assets/img/logo.png" class="img-fluid logo-desktop" alt="logo" />
                <img src="/admin_assets/img/logo-icon.png" class="img-fluid logo-mobile" alt="logo" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti ti-align-left"></i>
        </button>
        <!-- end navbar-header -->
        <!-- begin navigation -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navigation d-flex">
                <ul class="navbar-nav nav-left">
                    <li class="nav-item">
                        <a class="nav-link sidebar-toggle">
                            <i class="ti ti-align-right" style="cursor: pointer;"></i>
                        </a>
                    </li>
                    <li class="nav-item full-screen d-block d-lg-none" id="btnFullscreen">
                        <a href="javascript:void(0)" class="nav-link expand">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav nav-right ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-email"></i>
                        </a>
                        <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
                            <ul>
                                <li class="dropdown-header bg-gradient p-4 text-white text-left">Messages
                                    <label class="label label-info label-round">6</label>
                                    <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                        <span class="font-13"> Mark all as read</span></a>
                                </li>
                                <li class="dropdown-body">
                                    <ul class="scrollbar scroll_dark max-h-240">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="notification d-flex flex-row align-items-center">
                                                    <div class="notify-icon bg-img align-self-center">
                                                        <img class="img-fluid" src="/admin_assets/img/avtar/03.jpg" alt="user3">
                                                    </div>
                                                    <div class="notify-message">
                                                        <p class="font-weight-bold">Brianing Leyon</p>
                                                        <small>You will sail along until you...</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="notification d-flex flex-row align-items-center">
                                                    <div class="notify-icon bg-img align-self-center">
                                                        <img class="img-fluid" src="/admin_assets/img/avtar/01.jpg" alt="user">
                                                    </div>
                                                    <div class="notify-message">
                                                        <p class="font-weight-bold">Jimmyimg Leyon</p>
                                                        <small>Okay</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="notification d-flex flex-row align-items-center">
                                                    <div class="notify-icon bg-img align-self-center">
                                                        <img class="img-fluid" src="/admin_assets/img/avtar/02.jpg" alt="user2">
                                                    </div>
                                                    <div class="notify-message">
                                                        <p class="font-weight-bold">Brainjon Leyon</p>
                                                        <small>So, make the decision...</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="notification d-flex flex-row align-items-center">
                                                    <div class="notify-icon bg-img align-self-center">
                                                        <img class="img-fluid" src="/admin_assets/img/avtar/04.jpg" alt="user4">
                                                    </div>
                                                    <div class="notify-message">
                                                        <p class="font-weight-bold">Smithmin Leyon</p>
                                                        <small>Thanks</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="notification d-flex flex-row align-items-center">
                                                    <div class="notify-icon bg-img align-self-center">
                                                        <img class="img-fluid" src="/admin_assets/img/avtar/05.jpg" alt="user5">
                                                    </div>
                                                    <div class="notify-message">
                                                        <p class="font-weight-bold">Jennyns Leyon</p>
                                                        <small>How are you</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <div class="notification d-flex flex-row align-items-center">
                                                    <div class="notify-icon bg-img align-self-center">
                                                        <img class="img-fluid" src="/admin_assets/img/avtar/06.jpg" alt="user6">
                                                    </div>
                                                    <div class="notify-message">
                                                        <p class="font-weight-bold">Demian Leyon</p>
                                                        <small>I like your themes</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-footer">
                                    <a class="font-13" href="javascript:void(0)"> View All messages </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link" id="fullscreen-toggle" onclick="toggleFullScreen()">
                            <i class="fe fe-maximize" id="fullscreen-icon"></i>
                            <i class="fe fe-minimize" id="exit-fullscreen-icon" style="display:none;"></i>
                        </a>
                    </li>
                    <script>
                        function toggleFullScreen() {
                            if (!document.fullscreenElement) {
                                document.documentElement.requestFullscreen();
                            } else {
                                if (document.exitFullscreen) {
                                    document.exitFullscreen();
                                }
                            }
                        }

                        document.addEventListener("fullscreenchange", function() {
                            var fullscreenIcon = document.getElementById("fullscreen-icon");
                            var exitFullscreenIcon = document.getElementById("exit-fullscreen-icon");
                            if (document.fullscreenElement) {
                                fullscreenIcon.style.display = "none";
                                exitFullscreenIcon.style.display = "inline-block";
                            } else {
                                fullscreenIcon.style.display = "inline-block";
                                exitFullscreenIcon.style.display = "none";
                            }
                        });
                    </script>
                    <li class="nav-item">
                        <a class="nav-link search" href="javascript:void(0)" onclick="toggleSearch()">
                            <i class="ti ti-search"></i>
                        </a>
                        <div class="search-wrapper" id="search-wrapper" style="display: none;">
                            <div class="close-btn" onclick="toggleSearch()">
                                <i class="ti ti-close"></i>
                            </div>
                            <div class="search-content">
                                <form id="search-form">
                                    <div class="form-group">
                                        <i class="ti ti-search magnifier"></i>
                                        <input type="text" class="form-control autocomplete" placeholder="Search Here" id="search-input" autofocus="autofocus">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <script>
                        function toggleSearch() {
                            var searchWrapper = document.getElementById("search-wrapper");
                            if (searchWrapper.style.display === "none" || searchWrapper.style.display === "") {
                                searchWrapper.style.display = "block";
                            } else {
                                searchWrapper.style.display = "none";
                            }
                        }
                    </script>
                    <li class="nav-item dropdown user-profile">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/admin_assets/img/avtar/02.jpg" alt="avtar-img">
                            <span class="bg-success user-status"></span>
                        </a>
                        <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                            <div class="bg-gradient px-4 py-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="mr-1">
                                        <h4 class="text-white mb-0">VM Agri Exim</h4>
                                        <small class="text-white">vmagriexim@gmail.com</small>
                                    </div>
                                    <a href="/admin-logout" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i class="zmdi zmdi-power"></i></a>
                                </div>
                            </div>
                            <div class="p-4">
                                <a class="dropdown-item d-flex nav-link text-danger" href="/admin-logout">
                                    <i class="zmdi zmdi-power pr-2 text-danger"></i> Logout
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end navigation -->
    </nav>
    <!-- end navbar -->
</header>