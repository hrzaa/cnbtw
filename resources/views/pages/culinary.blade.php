@extends('layouts.app')
    @section('title')
    Kuliner Page
    @endsection
    @section('content')
    <div class="container-fluid py-5 bg-dark hero-heder" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url(/vendor/img/bg-hero.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Surga Kuliner</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Kuliner</li>
                </ol>
            </nav>
        </div>
    </div>

      <!-- Category Start -->
        <div class="container-fluid py-5 bg-white">
            <div class="container">
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                   <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.header solo culiners')</h5>
                   <h1 class="mb-5">@lang('lang.header category2')</h1>
                </div>
                <div class="row">
                @php
                    $incrementCategory = 0
                @endphp
                @forelse ($categories as $category)
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+=200 }}">
                        <a href="{{ route('culinary-categories-detail', $category->slug) }}" class="component-categories d-block">
                            <div class="categories-images">
                                <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100"/>
                            </div>
                            <p class="categories-text">{{ $category->{'name_'.app()->getLocale()} }}</p>
                        </a>
                    </div>
                @empty
                     <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                    No Categories Found!
                    </div>
                @endforelse
            </div>
        </div>
        <!-- Category End -->


    <!-- Menu Start -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.header solo culiners')</h5>
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
                <div class="col-12 text-center py-5">
                   <div class="d-flex justify-content-center">
                        {{ $culiners->links() }}
                    </div>
                </div>
                </div>
            </div>
    </div>
    <!-- Menu End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

@endsection
