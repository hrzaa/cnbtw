@extends('layouts.app')
 @section('title')
    Detail Kuliner Page
 @endsection
@section('content')
<div class="container-fluid bg-white p-0">
     <div class="container-fluid py-5 bg-dark hero-event" style="background: linear-gradient(0deg,
            rgba(15, 23, 43, 0.75),
            rgba(15, 23, 43, 0.75)),
        url(/vendor/img/satekere3.JPG), #0f172b;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $culiners->culiner_name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

    <!-- About Start -->
    <div class="container-fluid py-5 bg-white">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <section class="store-gallery" id="gallery">
                        <div class="container">
                        <div class="row">
                            <div class="col-lg-10" data-aos="zoom-in">
                            <transition name="slide-fade" mode="out-in">
                                <img
                                :src="photos[activePhoto].url"
                                :key="photos[activePhoto].id"
                                class="w-100 main-image"
                                alt="">
                            </transition>
                            </div>
                            <div class="col-lg-2">
                            <div class="row">
                                <div class="col-3 col-lg-12 mt-2 mt-lg-0"
                                v-for="(photo, index) in photos"
                                :key="photo.id"
                                data-aos="zoom-in"
                                data-aos-delay="100"
                                >
                                <a href="#" @click="changeActive(index)">
                                <img
                                :src="photo.url" class="w-100 thumbnail-image"
                                :class="{active:index == activePhoto}"
                                alt=""
                                >
                                </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </section>
                    </div>
                </div>
                <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">@lang('lang.about us')</h5>
                <h1 class="mb-4">What About {{ $culiners->culiner_name }} <i class="fa fa-utensils text-primary me-2"></i></h1>
                    <div class="uploader">By {{ $culiners->user->name }}</div>
                <p class="mb-4">{!! $culiners->{'culiner_desc_'.app()->getLocale()} !!}</p>
                    <div class="row g-4 mb-4">
                        
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ count($culiners->resto) }}</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Popular</p>
                                    <h6 class="text-uppercase mb-0">Place to Eat</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-8">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">
                        Theme
                    </h5>
                    <h1 class="mb-4">
                        Story of {{ $culiners->culiner_name }}
                    </h1>
                    <p class="mb-4">
                        {!! $culiners->{'culiner_history_'.app()->getLocale()} !!}
                    </p>
                </div>
            </div>
        </div>

         <div class="container py-5" id="resto">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Solo Culiners</h5>
                <h1 class="mb-5">@lang('lang.most popular restaurants')</h1>
            </div>
            <div class="row g-4">
                @php
                    $incrementCategory = 0
                @endphp
                @forelse ($restos as $resto)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+=100 }}">
                    <div class="team-item bg-white text-center h-100 d-flex p-4 flex-column">`
                        <img src="{{ Storage::url($resto->resto_galleries->first()->photos ?? '') }}" alt="">
                        <h3 class="mt-2 text-center">{{ $resto->resto_name }}</h3>
                        <div class="mt-auto p-2">
                            <a href="{{ $resto->address_link }}" target="_blank" class="mb-1">{{ $resto->address }}</a>
                        <h6>Rp{{ number_format($resto->price) }}</h6>
                            <small>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </small>
                        </div>
                        <a href="{{ route('resto-detail', $resto->slug) }}" class="btn btn-primary">detail resto</a>
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                        No Resto Found!
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>
    <!-- About End -->
    
@endsection

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted(){
           AOS.init();
        },
        data:{
          activePhoto: 0,
          photos:[
           @foreach($culiners->culiner_galleries as $gallery)
            {
              id:{{ $gallery->id }},
              url:"{{ Storage::url($gallery->photos) }}",
            },
           @endforeach
          ],
        },
        methods:{
          changeActive(id){
            this.activePhoto = id;
          },
        },
      });
    </script>

@endpush
