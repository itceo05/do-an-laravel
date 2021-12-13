@extends('master')
@section('banner')
    <section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="{{ url('front-end') }}/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">book your</span> tickets for
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Movie</b>
                    </span>
                </h1>
                <p>Safe, secure, reliable ticketing.Your ticket to live entertainment!</p>
            </div>
        </div>
    </section>
@endsection

@section('search')
    @include('search')
@endsection

@section('main')
    <section class="movie-section padding-top padding-bottom bg-two">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
                    <div class="widget-1 widget-facility">
                        <div class="widget-1-body">
                            <ul>
                                @foreach ($chair as $item)
                                <li>
                                    <a href="">
                                        <span class="cate">{{ $item->name }}</span>
                                        <span class="img">{{ number_format($item->price,2) }}$</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @foreach ($banner as $item)
                    <div class="widget-1 widget-banner">
                        <div class="widget-1-body">
                            <a href="">
                                <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="banner">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-9">
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h2 class="title">movies</h2>
                            <a class="view-all" href="{{ route('movie') }}">View All</a>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            @foreach ($film1 as $item)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{ route('film-detail', $item->id) }}">
                                                <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0">
                                                <a href="{{ route('film-detail', $item->id) }}">{{ $item->name }}</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <div class="thumb">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                    <span class="content">Time: {{ $item->time }} minutes</span>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                    <span class="content">Release date: {{ $item->release_date }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h2 class="title">Coming soon</h2>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            @foreach ($film2 as $item)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{ route('film-detail', $item->id) }}">
                                                <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0">
                                                <a href="{{ route('film-detail', $item->id) }}">{{ $item->name }}</a>
                                            </h5>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <div class="thumb">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                    <span class="content">Time: {{ $item->time }} minutes</span>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </div>
                                                    <span class="content">Release date: {{ $item->release_date }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="article-section">
                        <div class="section-header-1">
                            <h2 class="title">sports</h2>
                            <a class="view-all" href="sports.html">View All</a>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            <div class="col-sm-6 col-lg-4">
                                <div class="sports-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="#0">
                                            <img src="{{ url('front-end') }}/images/sports/sports01.jpg" alt="sports">
                                        </a>
                                        <div class="event-date">
                                            <h6 class="date-title">28</h6>
                                            <span>Dec</span>
                                        </div>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="#0">football league tournament</a>
                                        </h5>
                                        <div class="movie-rating-percent">
                                            <span>327 Montague Street</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="sports-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="#0">
                                            <img src="{{ url('front-end') }}/images/sports/sports02.jpg" alt="sports">
                                        </a>
                                        <div class="event-date">
                                            <h6 class="date-title">28</h6>
                                            <span>Dec</span>
                                        </div>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="#0">world cricket league 2020</a>
                                        </h5>
                                        <div class="movie-rating-percent">
                                            <span>327 Montague Street</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="sports-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="#0">
                                            <img src="{{ url('front-end') }}/images/sports/sports03.jpg" alt="sports">
                                        </a>
                                        <div class="event-date">
                                            <h6 class="date-title">28</h6>
                                            <span>Dec</span>
                                        </div>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="#0">basket ball tournament 2020</a>
                                        </h5>
                                        <div class="movie-rating-percent">
                                            <span>327 Montague Street</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@stop
