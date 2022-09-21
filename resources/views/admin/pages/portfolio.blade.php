<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Welcome to Kweemanage</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Company - v2.1.0
        * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    <body>
        <!-- ======= Header ======= -->
        @include('layouts.header')
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Portolio</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Portolio</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">

                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up">
                    @foreach($homepageportfolio as $portfolios)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset($portfolios->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Welcome</h4>
                            <p>Kweemanage</p>
                            <a href="{{ asset($portfolios->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="Click to enlarge"><i class="bx bx-plus"></i></a>
                            <a href="#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ======= Footer ======= -->
        @include('layouts.footer')
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
        <!-- Vendor JS Files -->
        <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/venobox/venobox.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    </body>
</html>