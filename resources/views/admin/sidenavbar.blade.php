<aside class="app-navbar">
    <div class="sidebar-nav scrollbar scroll_light">

        <ul class="metismenu" id="sidebarNav">
            <li class="nav-static-title">VMAE Admin</li>

            <li class="{{ Request::is('admin-dashboard') ? 'active' : '' }}">
                <a href="/admin-dashboard" aria-expanded="false">
                    <i class="nav-icon ti ti-dashboard"></i>
                    <span class="nav-title">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('admin-certificate','add-certificate','edit-certificate/*') ? 'active' : '' }}">
                <a href="/admin-certificate" aria-expanded="false">
                    <i class="nav-icon fa-solid fa-medal mt-1"></i>
                    <span class="nav-title">Certificate</span>
                </a>
            </li>
            <li class="{{ Request::is('admin-vegitables', 'admin-fruits', 'add-product-vegitables', 'add-product-fruits', 'edit-product/*', 'edit-product-fruits/*') ? 'active' : '' }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-bag"></i>
                    <span class="nav-title">Products</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ Request::is('admin-vegitables', 'add-product-vegitables', 'edit-product/*') ? 'active' : '' }}">
                        <a href="/admin-vegitables">Vegitables</a>
                    </li>
                    <li class="{{ Request::is('admin-fruits', 'add-product-fruits', 'edit-product-fruits/*') ? 'active' : '' }}">
                        <a href="/admin-fruits">Fruits</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin-blog','add-blog','edit-blog/*') ? 'active' : '' }}">
                <a href="/admin-blog" aria-expanded="false">
                    <i class="nav-icon ti ti-pencil"></i>
                    <span class="nav-title">Blog</span>
                </a>
            </li>
            <li class="{{ Request::is('admin-contact') ? 'active' : '' }}">
                <a href="/admin-contact" aria-expanded="false">
                    <i class="nav-icon ti ti-headphone"></i>
                    <span class="nav-title">Contact Us</span>
                </a>
            </li>
            <li class="{{ Request::is('admin-smtp') ? 'active' : '' }}">
                <a href="/admin-smtp" aria-expanded="false">
                    <i class="nav-icon ti ti-email"></i>
                    <span class="nav-title">SMTP Mail</span>
                </a>
            </li>
            <li class="{{ Request::is('admin-cache') ? 'active' : '' }}">
                <a href="/admin-cache" aria-expanded="false">
                    <i style="margin-top: 3px;" class="nav-icon fas fa-cog"></i>
                    <span class="nav-title">Cache Setting</span>
                </a>
            </li>
            <li class="{{ Request::is('admin-subscriber','admin-subscriber-mail') ? 'active' : '' }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-email"></i>
                    <span class="nav-title">Newsletter</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{ Request::is('admin-subscriber') ? 'active' : '' }}"><a href="/admin-subscriber">Subscriber</a></li>
                    <li class="{{ Request::is('admin-subscriber-mail') ? 'active' : '' }}"><a href="/admin-subscriber-mail">All Subscriber Send Mail</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin-seo', 'add-seo', 'edit-seo/*') ? 'active' : '' }}">
                <a href="/admin-seo" aria-expanded="false">
                    <i style="margin-top: 3px;" class="nav-icon fas fa-chart-line"></i>
                    <span class="nav-title">SEO Setting</span>
                </a>
            </li>
        </ul>
    </div>
</aside>