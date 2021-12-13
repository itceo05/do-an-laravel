@extends('master')

@section('banner')
    <!-- ==========Banner-Section========== -->
    <section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="{{ url('front-end') }}/images/banner/banner02.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title bold">get <span class="color-theme">movie</span> tickets</h1>
                <p>Buy movie tickets in advance, find movie times watch trailers, read movie reviews and much more</p>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

@endsection

@section('search')
    @include('search')
@endsection

@section('main')
    <section class="movie-section padding-top padding-bottom">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-3">
                    <div class="widget-1 widget-check">
                        <div class="widget-header">
                            <h5 class="m-title">Filter By</h5> <a href="{{ route('movie') }}" class="clear-check">Clear All</a>
                        </div>
                    </div>
                    <div class="widget-1 widget-check">
                        <div class="widget-1-body">
                            <h6 class="subtitle">genre</h6>
                            <div class="check-area" id="category">
                                @foreach ($category as $item)
                                    <div class="form-group">
                                        <input type="checkbox" name="category" id="genre{{ $item->id }}"
                                            value="{{ $item->id }}" {{ in_array($item->id, $check_category)?'checked':'' }}><label
                                            for="genre{{ $item->id }}">{{ $item->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="add-check-area">
                                <a href="#0">view more <i class="plus"></i></a>
                            </div>
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
                <div class="col-lg-9 mb-50 mb-lg-0">
                    <div class="filter-tab tab">
                        <div class="filter-area">
                            <div class="filter-main">
                                <div class="left">
                                    <div class="item">
                                        <span class="show">Show :</span>
                                        <select class="select-bar" name="limit" id="limit">
                                            <option value="6" {{ $check_limit==6?'selected':'' }}>6</option>
                                            <option value="12" {{ $check_limit==12?'selected':'' }}>12</option>
                                            <option value="18" {{ $check_limit==18?'selected':'' }}>18</option>
                                        </select>
                                    </div>
                                    {{-- <div class="item">
                                        <span class="show">Sort By :</span>
                                        <select class="select-bar">
                                            <option value="showing">now showing</option>
                                            <option value="exclusive">exclusive</option>
                                            <option value="trending">trending</option>
                                            <option value="most-view">most view</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <ul class="grid-button tab-menu">
                                    <li class="active">
                                        <i class="fas fa-th"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-bars"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-area">
                            <div class="tab-item active">
                                @if (empty($film->first()))
                                    <h2>Sorry, your film not found!</h2>
                                @endif
                                <div class="row mb-10 justify-content-center" id="hung1">
                                    @foreach ($film as $item)
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="movie-grid">
                                                <div class="movie-thumb c-thumb">
                                                    <a href="{{ route('film-detail', $item->id) }}">
                                                        <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="movie">
                                                    </a>
                                                </div>
                                                <div class="movie-content bg-one">
                                                    <h5 class="title m-0">
                                                        <a
                                                            href="{{ route('film-detail', $item->id) }}">{{ $item->name }}</a>
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
                            <div class="tab-item">
                                @if (empty($film->first()))
                                    <h2>Sorry, your film not found!</h2>
                                @endif
                                <div class="movie-area mb-10" id="hung2">
                                    @foreach ($film as $item)
                                        <div class="movie-list">
                                            <div class="movie-thumb c-thumb">
                                                <a href="{{ route('film-detail', $item->id) }}"
                                                    class="w-100 bg_img h-100"
                                                    data-background="{{ url('Uploads') }}/{{ $item->image }}">
                                                    <img class="d-sm-none"
                                                        src="{{ url('Uploads') }}/{{ $item->image }}" alt="movie">
                                                </a>
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title">
                                                    <a
                                                        href="{{ route('film-detail', $item->id) }}">{{ $item->name }}</a>
                                                </h5>
                                                <p class="duration">{{ $item->time }} minutes</p>
                                                <div class="movie-tags">
                                                    @foreach ($item->category as $value)
                                                        <a href="">{{ $value->name }}</a>
                                                    @endforeach
                                                </div>
                                                <div class="release">
                                                    <span>Release Date : </span> <a href="">{{ $item->release_date }}</a>
                                                </div>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{ url('front-end') }}/images/movie/tomato.png"
                                                                alt="movie">
                                                        </div>
                                                        <span class="content">100%</span>
                                                    </li>
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{ url('front-end') }}/images/movie/cake.png"
                                                                alt="movie">
                                                        </div>
                                                        <span class="content">100%</span>
                                                    </li>
                                                </ul>
                                                <div class="book-area">
                                                    <div class="book-ticket">
                                                        {{-- <div class="react-item">
                                                            <a href="#0">
                                                                <div class="thumb">
                                                                    <img src="{{ url('front-end') }}/images/icons/heart.png"
                                                                        alt="icons">
                                                                </div>
                                                            </a>
                                                        </div> --}}
                                                        <div class="react-item mr-auto">
                                                            <a href="#0">
                                                                <div class="thumb">
                                                                    <img src="{{ url('front-end') }}/images/icons/book.png"
                                                                        alt="icons">
                                                                </div>
                                                                <span><a href="{{ route('book', $item->slug) }}" class="" style="text-decoration: none;color:white">book tickets</a></span>
                                                            </a>
                                                        </div>
                                                        <div class="react-item">
                                                            <a href="{{ url('Uploads') }}/{{ $item->trailer }}"
                                                                class="trailer">
                                                                <div class="thumb">
                                                                    <img src="{{ url('front-end') }}/images/movie/video-button.png"
                                                                        alt="icons">
                                                                </div>
                                                                <span>watch trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="pagination-area text-center">
                            {{ $film->first()?$film->appends(request()->input())->links():'' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script>
        $('#category, #limit').change(function() {
            
            let category = [];
            let limit = $('#limit').val();
            let html1 = ``;
            let html2 = ``;
            $('h2').hide();
            $('input[name=category]:checked').each(function() {
                category.push(this.value);
            });
            $.ajax({
                url: '/ajax/movie',
                data: {
                    category: category,
                    limit: limit
                },
                success: function(data) {
                    data.forEach(item => {
                        console.log(item.category);
                        html1 += `<div class="col-sm-6 col-lg-4">
                                            <div class="movie-grid">
                                                <div class="movie-thumb c-thumb">
                                                    <a href="http://localhost:8000/film-detail/${item.id}">
                                                        <img src="{{ url('Uploads') }}/${item.image}" alt="movie">
                                                    </a>
                                                </div>
                                                <div class="movie-content bg-one">
                                                    <h5 class="title m-0">
                                                        <a
                                                            href="http://localhost:8000/film-detail/${item.id}">${item.name}</a>
                                                    </h5>
                                                    <ul class="movie-rating-percent">
                                                        <li>
                                                            <div class="thumb">
                                                                <i class="far fa-clock"></i>
                                                            </div>
                                                            <span class="content">Time: ${item.time} minutes</span>
                                                        </li>
                                                        <li>
                                                            <div class="thumb">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            </div>
                                                            <span class="content">Release date: ${item.release_date}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>`;
                        html2 += `<div class="movie-list">
                                            <div class="movie-thumb c-thumb">
                                                <a href="http://localhost:8000/film-detail/${item.id}"
                                                    class="w-100 bg_img h-100"
                                                    data-background="{{ url('Uploads') }}/${item.image}">
                                                    <img class="d-sm-none"
                                                        src="{{ url('Uploads') }}/${item.image}" alt="movie">
                                                </a>
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title">
                                                    <a
                                                        href="http://localhost:8000/film-detail/${item.id}">${item.name}</a>
                                                </h5>
                                                <p class="duration">${item.time} minutes</p>
                                                <div class="movie-tags">
                                                    
                                                </div>
                                                <div class="release">
                                                    <span>Release Date : </span> <a href="">${item.release_date}</a>
                                                </div>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{ url('front-end') }}/images/movie/tomato.png"
                                                                alt="movie">
                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{ url('front-end') }}/images/movie/cake.png"
                                                                alt="movie">
                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                </ul>
                                                <div class="book-area">
                                                    <div class="book-ticket">
                                                        <div class="react-item mr-auto">
                                                            <a href="#0">
                                                                <div class="thumb">
                                                                    <img src="{{ url('front-end') }}/images/icons/book.png"
                                                                        alt="icons">
                                                                </div>
                                                                <span>book ticket</span>
                                                            </a>
                                                        </div>
                                                        <div class="react-item">
                                                            <a href="{{ url('Uploads') }}/${item.trailer}"
                                                                class="trailer">
                                                                <div class="thumb">
                                                                    <img src="{{ url('front-end') }}/images/movie/video-button.png"
                                                                        alt="icons">
                                                                </div>
                                                                <span>watch trailer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                    });
                    $('#hung1').html(html1);
                    $('#hung2').html(html2);
                }
            });
        });
    </script>
@endsection
