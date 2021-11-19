<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="#">
        CRM Admin
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item p-3 mb-5">
                <span class="mt-1 sidebar-text">CRM Admin</span>
            </li>

            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('product.listing') }}" class="nav-link">
                    <span class="sidebar-text">Manage Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('category.listing') }}" class="nav-link">
                    <span class="sidebar-text">Manage Categories</span>
                </a>
            </li>

        </ul>
    </div>
</nav>