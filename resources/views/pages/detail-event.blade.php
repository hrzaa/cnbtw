@extends('layouts.app')
 @section('title')
    Detail Kuliner Page
 @endsection
@section('content')
     <div class="container-fluid py-5 bg-dark hero-even" style="background: linear-gradient(0deg,
            rgba(15, 23, 43, 0.75),
            rgba(15, 23, 43, 0.75)),
        url(/vendor/img/header-event.JPG), #0f172b;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $event->event_name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item"><a href="#">Event</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Event</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                @if ($event->event_galleries->isEmpty())
                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ url('/vendor/img/default.png') }}" alt="">
                @else
                    @foreach ($event->event_galleries as $gallery)
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ Storage::url($gallery->photos) }}" alt="">
                    @endforeach
                @endif
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">
                    @lang('lang.about us')
                    </h5>
                    <h1 class="mb-4">
                        Welcome to {{ $event->event_name }}
                    </h1>
                    <h6>Date : {{ date('d F Y', strtotime($event->date_start)) }} - {{ date('d F Y', strtotime($event->date_end)) }}</h6>
                    <h6>Location : <a href="{{ $event->address_link }}" target="_blank"> {{ $event->address }}</a></h6>
                    <p class="mb-4">
                        {!! $event->{'event_desc_'.app()->getLocale()} !!}
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

@endsection
