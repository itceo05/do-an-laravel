<style>
    .contents {
        word-break: break-all;
    }

    .fa,
    .fab,
    .fal,
    .far,
    .fas {
        line-height: 2.5!important;
    }

</style>
@extends('master')
@section('main')
    <!-- ==========Banner-Section========== -->
    <section class="details-banner bg_img" data-background="{{ url('Uploads') }}/{{ $film->image }}">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-thumb">
                    <img src="{{ url('Uploads') }}/{{ $film->image }}" alt="movie">
                    <a href="{{ url('Uploads') }}/{{ $film->trailer }}" class="video-popup">
                        <img src="{{ url('front-end') }}/images/movie/video-button.png" alt="movie">
                    </a>
                </div>
                <div class="details-banner-content offset-lg-3">
                    <h3 class="title">{{ $film->name }}</h3>
                    {{-- <div class="tags">
                        <a href="#0">English</a>
                        <a href="#0">Hindi</a>
                        <a href="#0">Telegu</a>
                        <a href="#0">Tamil</a>
                    </div> --}}
                    @foreach ($film->category as $item)
                        <a href="" class="button">{{ $item->name }}</a>
                    @endforeach
                    <div class="social-and-duration">
                        {{-- <div class="duration-area">
                            <div class="item">
                                <i class="fas fa-calendar-alt"></i><span>06 Dec, 2020</span>
                            </div>
                            <div class="item">
                                <i class="far fa-clock"></i><span>2 hrs 50 mins</span>
                            </div>
                        </div> --}}
                        <ul class="social-share">
                            <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ==========Banner-Section========== -->
    <!-- ==========Book-Section========== -->
    <section class="book-section bg-one">
        <div class="container">
            <div class="book-wrapper offset-lg-3">
                <div class="left-side">
                    <div class="item">
                        <div class="item-header">
                            <div class="thumb">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="counter-area">
                                <span class="counter-item">{{ $film->time }} minutes</span>
                            </div>
                        </div>
                        <p>Time</p>
                    </div>
                    <div class="item">
                        <div class="item-header">
                            <div class="thumb">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="counter-area">
                                <span class="counter-item">{{ $film->release_date }}</span>
                            </div>
                        </div>
                        <p>Release date</p>
                    </div>
                    <div class="item">
                        <div class="item-header">
                            <h5 class="title">{{ number_format($rates_avg, 1) }}</h5>
                            <div class="rated">
                                @for ($i = 1; $i < 6; $i++)
                                    <i class="fas fa-heart"
                                        style="{{ $i <= ceil($rates_avg) ? 'color:red' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p>Users Rating</p>
                    </div>
                    <div class="item">
                        <div class="item-header">
                            <div class="rated rate-it">
                                @for ($i = 1; $i < 6; $i++)
                                    <i class="fas fa-heart" id="heart{{ $i }}"
                                        style="{{ $i <= $star ? 'color:red' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <p><a href="#0">Rate It</a></p>
                    </div>
                </div>
                <a href="{{ route('book', $film->slug) }}" class="custom-button">book tickets</a>
            </div>
        </div>
    </section>
    <!-- ==========Book-Section========== -->

    <!-- ==========Movie-Section========== -->
    <section class="movie-details-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center flex-wrap-reverse mb--50">
                <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                    {{-- <div class="widget-1 widget-tags">
                        <ul>
                            <li>
                                <a href="#0">2D</a>
                            </li>
                            <li>
                                <a href="#0">imax 2D</a>
                            </li>
                            <li>
                                <a href="#0">4DX</a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="widget-1 widget-offer">
                        <h3 class="title">Applicable offer</h3>
                        <div class="offer-body">
                            <div class="offer-item">
                                <div class="thumb">
                                    <img src="{{ url('front-end') }}/images/sidebar/offer01.png" alt="sidebar">
                                </div>
                                <div class="content">
                                    <h6>
                                        <a href="#0">Amazon Pay Cashback Offer</a>
                                    </h6>
                                    <p>Win Cashback Upto Rs 300*</p>
                                </div>
                            </div>
                            <div class="offer-item">
                                <div class="thumb">
                                    <img src="{{ url('front-end') }}/images/sidebar/offer01.png" alt="sidebar">
                                </div>
                                <div class="content">
                                    <h6>
                                        <a href="#0">PayPal Offer</a>
                                    </h6>
                                    <p>Transact first time with Paypal and
                                        get 100% cashback up to Rs. 500</p>
                                </div>
                            </div>
                            <div class="offer-item">
                                <div class="thumb">
                                    <img src="{{ url('front-end') }}/images/sidebar/offer03.png" alt="sidebar">
                                </div>
                                <div class="content">
                                    <h6>
                                        <a href="#0">HDFC Bank Offer</a>
                                    </h6>
                                    <p>Get 15% discount up to INR 100*
                                        and INR 50* off on F&B T&C apply</p>
                                </div>
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
                <div class="col-lg-9 mb-50">
                    <div class="movie-details">
                        <h3 class="title">photos</h3>
                        <div class="details-photos owl-carousel">
                            @foreach ($film->photo as $item)
                                <div class="thumb">
                                    <a href="" class="img-pop">
                                        <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="movie">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab summery-review">
                            <ul class="tab-menu">
                                <li class="active">
                                    summery
                                </li>
                                <li>
                                    user review <span>{{ $count }}</span>
                                </li>
                            </ul>
                            <div class="tab-area">
                                <div class="tab-item active">
                                    <div class="item">
                                        <h5 class="sub-title">Synopsis</h5>
                                        <div class="contents">
                                            <p>{!! $film->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="header">
                                            <h5 class="sub-title">cast</h5>
                                            <div class="navigation">
                                                <div class="cast-prev"><i
                                                        class="flaticon-double-right-arrows-angles"></i></div>
                                                <div class="cast-next"><i
                                                        class="flaticon-double-right-arrows-angles"></i></div>
                                            </div>
                                        </div>
                                        <div class="casting-slider owl-carousel">
                                            @foreach ($film->film_maker->where('type', 2) as $item)
                                                <div class="cast-item">
                                                    <div class="cast-thumb">
                                                        <a href="#0">
                                                            <img src="{{ url('Uploads') }}/{{ $item->image }}"
                                                                alt="cast">
                                                        </a>
                                                    </div>
                                                    <div class="cast-content">
                                                        <h6 class="cast-title"><a href="">{{ $item->name }}</a></h6>
                                                        <span class="cate">actor</span>
                                                        <p>As {{ $item->as }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="header">
                                            <h5 class="sub-title">crew</h5>
                                            <div class="navigation">
                                                <div class="cast-prev-2"><i
                                                        class="flaticon-double-right-arrows-angles"></i></div>
                                                <div class="cast-next-2"><i
                                                        class="flaticon-double-right-arrows-angles"></i></div>
                                            </div>
                                        </div>
                                        <div class="casting-slider-two owl-carousel">
                                            @foreach ($film->film_maker->where('type', 1) as $item)
                                                <div class="cast-item">
                                                    <div class="cast-thumb">
                                                        <a href="#0">
                                                            <img src="{{ url('Uploads') }}/{{ $item->image }}"
                                                                alt="cast">
                                                        </a>
                                                    </div>
                                                    <div class="cast-content">
                                                        <h6 class="cast-title"><a href="">{{ $item->name }}</a></h6>
                                                        <span class="cate">{{ $item->as }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-item">
                                    @foreach ($review as $item)
                                        <div class="movie-review-item">
                                            <div class="author">
                                                {{-- <div class="thumb">
                                                <a href="#0">
                                                    <img src="{{ url('front-end') }}/images/cast/cast02.jpg" alt="cast">
                                                </a>
                                            </div> --}}
                                                <div class="movie-review-info">
                                                    {{-- <span class="reply-date">13 Days Ago</span> --}}
                                                    <h6 class="subtitle"><a href="">{{ $item->user->name }}</a>
                                                    </h6>
                                                    @if ($book->where('user_id', $item->user_id)->first())
                                                        <span><i class="fas fa-check"></i> verified review</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="movie-review-content">
                                                <div class="review">
                                                    @for ($i = 1; $i < 6; $i++)
                                                        <i class="fas fa-heart"
                                                            style="{{ ($i <= (isset($rates->where('user_id', $item->user_id)->first()->star)?$rates->where('user_id', $item->user_id)->first()->star:0)) ? 'color:red' : 'color:#223c6e' }}"></i>
                                                    @endfor
                                                </div>
                                                {{-- <h6 class="cont-title">Awesome Movie</h6> --}}
                                                <p>{{ $item->content }}</p>
                                                <div class="review-meta">
                                                    <a href="">
                                                        <i class="flaticon-hand"></i><span>0</span>
                                                    </a>
                                                    <a href="" class="dislike">
                                                        <i class="flaticon-dont-like-symbol"></i><span>0</span>
                                                    </a>
                                                    <a href="">
                                                        Report Abuse
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="load-more text-center">
                                        {{ $review->links() }}
                                    </div>
                                    <div class="leave-comment">
                                        <h5 class="title">leave comment</h5>
                                        @if (Auth::check())
                                            <form class="blog-form" method="POST">
                                                @csrf
                                                <input type="hidden" name="film_id" value="{{ $film->id }}">
                                                <div class="form-group">
                                                    <textarea placeholder="Write A Message" name="mess"></textarea>
                                                </div>
                                                @if ($errors->has('mess'))
                                                    <small class="err col-md-12">Please write something!</small>
                                                @endif
                                                <div class="form-group">
                                                    <input type="submit" value="Submit Now">
                                                </div>
                                            </form>
                                        @else
                                            <p class="text-center" style="font-size: 20px;">Please sign in to comment!
                                                <a href="{{ route('login', ['film_detail' => $film->id]) }}">Sign in</a>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Movie-Section========== -->
@endsection

@section('script')
    <script>
        $('.rate-it .fa-heart').click(function() {
            let film_id = "{{ $film->id }}";
            let user_id = "{{ Auth::check() == 1 ? Auth::user()->id : 0 }}";
            if ("{{ Auth::check() }}" != 1) {
                Swal.fire('Oops...', 'Please sign in to rate!', 'error');
            } else {
                let star = $(this).attr('id').replace('heart', '');
                for (let i = 1; i < 6; i++) {
                    if (i <= star) {
                        $('.rate-it #heart' + i).css({
                            color: 'red'
                        });
                    } else {
                        $('.rate-it #heart' + i).css({
                            color: '#223c6e'
                        });
                    }
                }
                $.ajax({
                    url: '/ajax/rate',
                    data: {
                        film_id: film_id,
                        user_id: user_id,
                        star: star
                    },
                    success: function(data) {

                    }
                });
            }
        });
    </script>
@endsection
