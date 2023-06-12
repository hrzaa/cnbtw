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
            <div class="container-fluid py-5 bg-dark hero-home mb-5" >
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">@lang('lang.header home')</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">@lang('lang.paragraf home')</p>
                            <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">@lang('lang.read more')</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden animated slideInRight">
                            <img class="img-fluid" src="/vendor/img/group-92.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Category Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                   <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.header solo culiners')</h5>
                   <h1 class="mb-5">@lang('lang.header category')</h1>
                </div>
                <div class="row">
                @php
                    $incrementCategory = 0
                @endphp
                @forelse ($categories as $category)
                    <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory+=100 }}">
                        <a href="{{ route('culinary') }}" class="component-categories d-block">
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


        <!-- About Start -->
        <div class="container-xxl py-5">
           <div class="container">
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
                                   <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $culiners->count() }}</h1>
                                   <div class="ps-4">
                                       <p class="mb-0">@lang('lang.p.k.n typical')</p>
                                       <h6 class="text-uppercase mb-0">@lang('lang.p.k.n culiners')</h6>
                                   </div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                   <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $restos->count() }}</h1>
                                   <div class="ps-4">
                                       <p class="mb-0">@lang('lang.p.k.n popular')</p>
                                       <h6 class="text-uppercase mb-0">@lang('lang.p.k.n place to eat')</h6>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <a class="btn btn-primary py-3 px-5 mt-2" href="">@lang('lang.read more')</a>
                   </div>
               </div>
           </div>
       </div>
       <!-- About End -->

       <!-- About Start -->
       <div class="container-xxl py-5">
           <div class="container">
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
       </div>
       <!-- About End -->

    <!-- Menu Start -->
    <div class="container-fluid py-5 bg-white">
        <div class="container">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">@lang('lang.food menu')</h5>
                <h1 class="mb-5">@lang('lang.all foods available')</h1>
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
                                    <p class="card-text"><small class="text-muted">Last update{{ $culiner->updated_at->diffForHumans() }}</small></p>
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
    </div>
    <!-- Menu End -->

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
                   
                </div>
            </div>
        </div>
        <!-- eVENT End -->

       <!-- Popular Start -->
            <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Solo Culiners</h5>
                    <h1 class="mb-5">@lang('lang.most popular restaurants')</h1>
                </div>
                <div class="row g-4">
                    @forelse ($restos as $resto)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item text-center rounded overflow-hidden p-2">
                            <div class=" overflow-hidden m-4">
                                <img class="img-fluid" src="{{ Storage::url($resto->resto_galleries->first()->photos ?? '') }}" alt="">
                            </div>
                            <h5 class="mb-0">{{ $resto->resto_name }}</h5>
                            <a href="{{ $resto->address_link }}" target="_blank" class="mb-1">{{ $resto->address }}</a>
                            {{-- <a class="mb-1">{{ $resto->address }}</a> --}}
                            <h6>Rp{{ number_format($resto->price) }}</h6>

                                <!-- Add icon library -->
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
                    @empty
                        <div class="col-12 text-center py-5 wow fadeInUp" data-wow-delay="0.1s">
                            No Resto Found!
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
        <!-- Popular End -->

               <!-- Reservation Start -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Book A Table Online</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select1">
                                          <option value="1">People 1</option>
                                          <option value="2">People 2</option>
                                          <option value="3">People 3</option>
                                        </select>
                                        <label for="select1">No Of People</label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->
        
          <!-- Testimonial Start -->
        <div class="container-fluid py-5 wow fadeInUp bg-white" data-wow-delay="0.1s">
           <div class="container">
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
           </div>
        </div>
        <!-- Testimonial End -->



       <!-- Back to Top -->
       <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
   </div>


@endsection


