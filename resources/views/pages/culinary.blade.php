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

    <div class="container-fluid py-5 bg-white">
       
        {{-- Category start --}}
        <div class="container py-5">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.header solo culiners')</h5>
                <h1 class="mb-5">@lang('lang.header category2')</h1>
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
        {{-- Category END --}}

        {{-- Culinary start --}}
        <div class="container py-5">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.header solo culiners')</h5>
                <h1 class="mb-5">@lang('lang.all culiners available')</h1>  
            </div>
             <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
                 <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="position-relative mx-auto">
                        <form action="{{ route('culinary-search') }}" method="GET">
                            @csrf
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="what you want?" name="keyword" autocomplete="off" value="{{ request('keyword') }}">
                            <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Search</button>
                        </form>
                    </div>
                </div>
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
        {{-- culinary end --}}

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    

@endsection
