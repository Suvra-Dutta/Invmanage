@extends('layouts.landing')
@section('home_content')
@php
    $aboutUs   = DB::table('home_abouts')->get();
    $portfolio = DB::table('portfolios')->get();
@endphp
    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>About Us</strong></h2>
            </div>
            <div class="row content">
                @foreach($aboutUs as $about)
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>{{ $about->title }}</h2>
                    <h3>{{ $about->short_desc }}</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <p>{{ $about->long_desc }}</p>                      
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End About Us Section -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                </div>
            </div>
            <div class="row portfolio-container" data-aos="fade-up">
                @foreach($portfolio as $portfolios)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset($portfolios->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <a href="{{ asset($portfolios->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="" class="details-link" title="More Details"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Brands</h2>
            </div>
            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
                @foreach($brands as $brand)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="client-logo">
                            <img src="{{ $brand->brand_image }}" style="height: 100px;width:180px;" class="img-fluid" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Our Clients Section -->
@endsection