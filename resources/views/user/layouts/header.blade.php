<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('user.dashboard') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Blogku</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ Route('user.dashboard') }}">Beranda</a></li>
                <li><a href="{{ route('user.blog.index') }}">Indeks</a></li>
                <li class="dropdown">
                    <a href="category.html">
                        <span>Kategori</span><i class="bi bi-chevron-down dropdown-indicator"></i>
                    </a>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{ route('user.category.index', $category) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
            <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="{{ route('user.blog.search') }}" class="search-form" method="GET">
                    @csrf
                    <span class="icon bi-search"></span>
                    <input type="text" name="query" placeholder="Search" class="form-control">
                    <button type="submit" hidden></button>
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header>