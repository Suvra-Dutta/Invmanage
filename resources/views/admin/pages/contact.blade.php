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
    </head>
    <body>
        <!-- ======= Header ======= -->
        @include('layouts.header')
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Contact</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- ======= Contact Section ======= -->
        <div class="map-section">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=kalabagan%20dolphin%20goli&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
        </div>
        <section id="contact" class="contact">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="icofont-google-map"></i>
                                    <h4>Location:</h4>
                                    <p>{{ $homepagecontacts->address }}</p>
                                </div>
                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>{{ $homepagecontacts->email }}</p>
                                </div>
                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-phone"></i>
                                    <h4>Call:</h4>
                                    <p>{{ $homepagecontacts->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <form action="{{ route('homecontactpage.messageform') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="applicantname" class="form-control" id="name" placeholder="Your Name" />
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="applicantemail" id="email" placeholder="Your Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="applicantsubject" id="subject" placeholder="Subject" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="applicantmessage" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-success">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->
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