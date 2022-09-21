<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="index.html"><span>Com</span>pany</a></h1>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('homeportfoliopage') }}">Portfolio</a></li>
                <li><a href="{{ route('homecontactpage') }}">Contact</a></li>
            </ul>
        </nav><!-- .nav-menu -->
        <div class="header-social-links">
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        </div>
    </div>
</header><!-- End Header -->
