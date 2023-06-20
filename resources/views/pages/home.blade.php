@extends('layouts.app')
@section('title')
   Home Page
@endsection
@section('content')
    <div class="container-fluid bg-white p-0">
       <!-- Spinner Start -->
       <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
           <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
               <span class="sr-only">Loading...</span>
           </div>
       </div>
       <!-- Spinner End -->
        <section class="home" id="home" >
            <div class="container-fluid py-5 bg-dark hero-home" >
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">@lang('lang.header home')</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">@lang('lang.paragraf home')</p>
                            <a href="#culinary-start" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">@lang('lang.read more')</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden animated slideInRight">
                            <img class="img-fluid" src="/vendor/img/group-92.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        
    <div class="container-fluid py-5 bg-white">
        {{-- category start --}}
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.header solo culiners')</h5>
                <h1 class="mb-5">@lang('lang.header category')</h1>
            </div> 
            <div class="row"> 
                @php
                    $incrementCategory = 0
                @endphp
                <div class="owl-carousel owl-theme owl-img-responsive">
                    @foreach ($categories as $category)
                        <div class="item" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+=200 }}">
                            <a href="{{ route('culinary-categories-detail', $category->slug) }}" class="component-categories d-block h-100 p-2">
                                <div class="categories-images p-3">
                                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100"/>
                                </div>
                                <h5 class="categories-text mt-2">{{ $category->{'name_'.app()->getLocale()} }}</h5>
                            </a>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
        {{-- category end --}}

        {{-- about start --}}
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="/vendor/img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="/vendor/img/about-2.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="/vendor/img/about-3.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="/vendor/img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">@lang('lang.about us')</h5>
                <h1 class="mb-4">@lang('lang.header kuliner nusantara')<i class="fa fa-utensils text-primary me-2"></i></h1>
                    <p class="mb-4">@lang('lang.paragraf kuliner nusantara')</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $culinersCount}}</h1>
                                <div class="ps-4">
                                    <p class="mb-0">@lang('lang.p.k.n typical')</p>
                                    <h6 class="text-uppercase mb-0">@lang('lang.p.k.n culiners')</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $restosCount }}</h1>
                                <div class="ps-4">
                                    <p class="mb-0">@lang('lang.p.k.n popular')</p>
                                    <h6 class="text-uppercase mb-0">@lang('lang.p.k.n place to eat')</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="#resto">@lang('lang.read more')</a>
                </div>
            </div>
        </div>
        {{-- about end --}}

        {{-- about start --}}
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end static">
                            <img class="img-fluid rounded w-250 wow zoomIn" data-wow-delay="0.5s"
                                src="/vendor/img/bg-solo2.jpeg" />
                        </div>
                        <div class="col-6 text-end absolute ">
                            <img class="img-fluid rounded w-250 wow zoomIn" data-wow-delay="0.7s"
                                src="/vendor/img/bg-solo1.jpeg" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">
                        @lang('lang.about us')
                    </h5>
                    <h1 class="mb-4">
                        @lang('lang.history of solo')
                    </h1>
                    <p class="mb-4">
                    @lang('lang.paragraf solo')
                    </p>
                </div>
            </div>
        </div>
        {{-- about end --}}

        {{-- culinary start --}}
        <div class="container py-5" id="culinary-start">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.culiner menu')</h5>
                <h1 class="mb-5">@lang('lang.all culiners available')</h1>
            </div>
             <div class="row g-4 justify-content-center">
                @php
                    $incrementCategory = 0
                @endphp
                @forelse ($culiners as $culiner)
                   <div class="card mx-3 my-3 border-0" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+=200 }}" style="border-radius : 8px; background-color: #f0f0f0; max-width: 600px;">
                        <div class="row g-0">
                            <div class="col-md-4 img-card">
                               <div class="overflow-hidden text-center m-2">
                                @if ($culiner->culiner_galleries->count())
                                    <a href="{{ route('culinary-detail', $culiner->slug) }}"><img class="img-fluid img-culiner" src="{{ Storage::url($culiner->culiner_galleries->first()->photos) }}" alt=""></a>
                                @else
                                    <a href="{{ route('culinary-detail', $culiner->slug) }}"><img class="img-fluid img-culiner" src="{{ url('/vendor/img/default.png') }}" alt=""></a>
                                @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $culiner->culiner_name }}</h5>
                                    <p class="card-text">{!! Str::words($culiner->{'culiner_desc_'.app()->getLocale()}, 20) !!} <span><a href="{{ route('culinary-detail', $culiner->slug) }}" class="text-primary">Think to Try</a></span></p>
                                    <p class="card-text"><small class="text-muted">Last update {{ $culiner->updated_at->diffForHumans() }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                        <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                        No Culinary Found!
                    </div>
                @endforelse
            </div>
        </div>
        {{-- culinary end --}}

        {{-- event start --}}
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.solo events')</h5>
                <h1 class="mb-5">@lang('lang.our event')</h1>
                </div>
            <div class="row g-4">
                @php
                    $incrementCategory = 0
                @endphp
                @forelse ($events as $event)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+=100 }}">
                    <div class="team-item bg-white h-100 d-flex p-4 flex-column">`
                        <img src="{{ Storage::url($event->event_galleries->first()->photos ?? '') }}" alt="">
                        <h3 class="mt-2 text-center">{{ $event->event_name }}</h3>
                        <p>{!! Str::words($event->{'event_desc_'.app()->getLocale()}, 20) !!} <span></span></p>
                        <a href="{{ route('event-detail', $event->slug) }}" class="btn btn-primary mt-auto">Detail</a>
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                        No Event Found!
                    </div>
                @endforelse
                
            </div>
        </div>
        {{-- event end --}}

        {{-- resto start --}}
        <div class="container py-5" id="resto">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Solo Culiners</h5>
                <h1 class="mb-5">@lang('lang.most popular restaurants')</h1>
            </div>
            <div class="row g-4">
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
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                        No Resto Found!
                    </div>
                @endforelse

            </div>
        </div>
        {{-- resto end --}}

        {{-- video start --}}
         <div class="container py-5">
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/U6y01T1cZiU?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        {{-- video end --}}

        {{-- review start --}}
        {{-- <div class="container py-5">
            <div class="text-center">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.testimonial')</h5>
                <h1 class="mb-5">@lang('lang.suggestions and critics')</h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="review">
                        @forelse ($reviews as $review)
                            <div class="testimonial-item bg-transparent rounded p-3">
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid flex-shrink-0 rounded-circle" src="/vendor/img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                                    <div class="ps-3">
                                        <h5 class="mb-1">{{ $review->user->name }}</h5>
                                        <p>{{ $review->comment }}</p>
                                            <small>{{ $review->updated_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                                No Review Found!
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- review end --}}

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>

@endsection


