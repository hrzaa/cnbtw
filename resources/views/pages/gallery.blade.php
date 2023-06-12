@extends('layouts.app')
 @section('title')
    Event Page
 @endsection
 @section('content')
    <div class="container-fluid py-5 bg-dark hero-header" style="background: linear-gradient(0deg,
            rgba(15, 23, 43, 0.75),
            rgba(15, 23, 43, 0.75)),
        url(/vendor/img/bg-solo2.jpeg), #0f172b;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
            <h6 class="text-white">The gallery is a place where you can find various photos and videos about the city of Solo, be it culinary or tourism.</h6>
        </div>
    </div>

     <!-- Gallery Start -->
        <div class="container-fluid py-5 bg-white">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Solo Foods</h5>
                    <h1 class="mb-5">@lang('lang.resto gallery')</h1>
                 </div>
                 <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row mb-3">
                        @php
                            $incrementProduct = 0
                        @endphp
                        @forelse ($restos as $resto)

                            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct+=100 }}">
                              <div class="content bg-dark">
                                    <img src="{{ Storage::url($resto->photos) }}" class="img-content">
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                                No Gallery Found!
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    <!-- Gallery End -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


@endsection
