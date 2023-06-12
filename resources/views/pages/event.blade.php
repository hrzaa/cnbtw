@extends('layouts.app')
 @section('title')
    Event Page
 @endsection
 @section('content')
    <div class="container-fluid py-5 bg-dark hero-header" style="background: linear-gradient(0deg,
            rgba(15, 23, 43, 0.75),
            rgba(15, 23, 43, 0.75)),
        url(/vendor/img/header-event.JPG), #0f172b;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Semangat Festival</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>

     {{-- @dd($events) --}}

        <!-- Event Start -->
        <div class="container-fluid bg-white py-5">
            <div class="container mt-3">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.solo events')</h5>
                    <h1 class="mb-5">@lang('lang.our event')</h1>
                 </div>
                <div class="row g-4">
                    @php
                        $incrementCategory = 0
                    @endphp
                    @forelse ($events as $event)
                    <div class="col-lg-3 col-md-6"  data-aos="fade-up" data-aos-delay="{{ $incrementCategory+=100 }}" style="color: #0c0d36;">
                        <div class="team-item rounded overflow-hidden">
                            <div class="rounded overflow-hidden m-4">
                                <a href="{{ route('event-detail', $event->slug) }}"><img class="img-event" src="{{ Storage::url($event->event_galleries->first()->photos ?? '') }}" alt=""></a>
                            </div>
                            <h4 class="mt-4 text-center">{{ $event->event_name }}</h4>
                            <div class="maps">
                                 <i class="fas fa-map-marked-alt p-3"></i><a href="">Kota Surakarta, Jawa Tengah</a>
                            </div>
                            <div class="date mb-2">
                               <i class="fas fa-calendar-alt p-3"></i>{{ date('d F Y', strtotime($event->date_start)) }} - {{ date('d F Y', strtotime($event->date_end)) }}
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                            No Event Found!
                        </div>
                    @endforelse
                     {{ $events->links() }}




                </div>
            </div>
        </div>
        <!-- eVENT End -->

        <!-- News Event Start -->
        <div class="container-fluid pt-5 bg-white">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">
                        @lang('lang.finished events')
                    </h5>
                    <h1 class="mb-5">@lang('lang.occured events')</h1>
                </div>
                <div class="row g-4">
                   <div class="container-fluid py-5 bg-dark hero-header mb-5" style="background: linear-gradient(0deg,
                    rgba(15, 23, 43, 0.75),
                    rgba(15, 23, 43, 0.75)),
                    url(/vendor/img/header-event.JPG), #0f172b;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-size: cover;">
                        <div class="container text-start my-5 pt-5 pb-4">
                            <h1 class="display-3 text-white mb-3 animated slideInDown">Semangat Festival</h1>
                            <h6 class="text-white">This year, the theme is the taste of Indonesian culinary satay. which starts March 9-12, 2023 at the Vastenburg Fortress</h6>
                            <a href="" class="">Start Explore  <i class="fas fa-arrow-right text-primary mb-4"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News Event End -->

        <!-- Back to Top -->
       <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


@endsection
