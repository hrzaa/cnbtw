@extends('layouts.app')
 @section('title')
    Detail Resto Page
 @endsection
@section('content')
     <div class="container-fluid py-5 bg-dark hero-even" style="background: linear-gradient(0deg,
            rgba(15, 23, 43, 0.75),
            rgba(15, 23, 43, 0.75)),
        url(/vendor/img/bg-solo-resto.jpg), #0f172b;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $restos->resto_name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item"><a href="#">Culinary</a></li>
                    <li class="breadcrumb-item"><a href="#">Resto</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Resto</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                @if ($restos->resto_galleries->isEmpty())
                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ url('/vendor/img/default.png') }}" alt="">
                @else
                    @foreach ($restos->resto_galleries as $gallery)
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ Storage::url($gallery->photos) }}" alt="">
                    @endforeach
                @endif
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">
                    @lang('lang.about us')
                    </h5>
                    <h1 class="mb-4">
                        Welcome to Resto {{ $restos->resto_name }}
                    </h1>
                    <h6>Price : Rp.{{ number_format($restos->price) }}</h6>
                    <h6>Location : <a href="{{ $restos->address_link }}" target="_blank"> {{ $restos->address }}</a></h6>
                    <p class="mb-4">
                        {!! $restos->{'resto_desc_'.app()->getLocale()} !!}
                    </p>

                    <div class="container py-5">
                        <div class="text-center">
                            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                            <h1 class="mb-5">Suggestions and Critics!!!</h1>
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
                    </div> 
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row g-0">
                <div class="col-md-12 d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Ulasan</h5>
                        <h1 class="text-dark mb-4">Give Your Review</h1>
                        <form action="{{ route('review', $restos->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                                @auth
                                <div class="col-12">
                                    <input type="hidden" name="resto_id" value="{{ $restos->id }}">
                                    <input type="hidden" class="form-control" id="users_id" name="users_id" value="{{ Auth::user()->id }}" readonly>
                                </div>
                                @else
                                    <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                @endauth
                                <div class="col-12 ">
                                <div class="form-floating">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rating" value="5" checked/>
                                        <label for="star5" title="star5">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label for="star4" title="star4">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label for="star3" title="star3">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label for="star2" title="star2">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label for="star1" title="star1">1 star</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Your Review" id="review" name="comment" style="height: 100px"></textarea>
                                        <label for="message">Your Review</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                @auth
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Now</button>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary w-100 py-3">Sign To Review</a>
                                @endauth
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- About End -->

        

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

@endsection
