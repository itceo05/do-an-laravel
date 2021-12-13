<style>
    .choose-seats {
        background-image: -webkit-linear-gradient(169deg, #5560ff 17%, #aa52a1 63%, #ff4343 100%);
        padding: 10px 49px;
        font-weight: 600;
        border-radius: 25px;
        display: none;
    }

    .choose-seats:hover {
        -webkit-box-shadow: 0px 10px 15px 0px rgba(59, 55, 188, 0.5);
        box-shadow: 0px 10px 15px 0px rgba(59, 55, 188, 0.5);
    }

    .select-bar {
        margin-right: 20px;
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
    <section class="details-banner hero-area bg_img seat-plan-banner"
        data-background="{{ url('Uploads') }}/{{ $film->image }}">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content style-two">
                    <h3 class="title">{{ $film->name }}</h3>
                    <div class="tags">
                        <a href="">Time: {{ $film->time }} minutes</a>
                        {{-- <a href="#0">English - 2D</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Page-Title========== -->
    <p class="update-seat" style="display: none">{{ json_encode($update_seat) }}</p>
    <section class="page-title bg-one">
        <form action="">
            @csrf
            <input type="hidden" name="id" value="{{ $film->id }}">
            <div class="container">
                <div class="page-title-area">
                    <div class="item date-item">
                        <select class="select-bar" name="cinema" id="cinema">
                            <option value="" selected disabled>Choose cinema</option>
                            @foreach ($cinema as $item)
                                <option value="{{ $item->id }}"
                                    {{ request()->cinema == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="item date-item">
                        @if (request()->date)
                            <div id="date">
                                <select class="select-bar" name="date">
                                    <option value="" selected disabled>Choose date</option>
                                    @foreach ($date as $item)
                                        <option value="{{ $item->date }}"
                                            {{ request()->date == $item->date ? 'selected' : '' }}>
                                            {{ $item->date }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div id="date">

                            </div>
                        @endif
                        @if (request()->date)
                            <div id="time">
                                <select class="select-bar" name="time">
                                    <option value="" selected disabled>Choose time</option>
                                    @foreach ($time as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request()->time == $item->id ? 'selected' : '' }}>{{ $item->time }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div id="time">

                            </div>
                        @endif
                    </div>
                    <div class="item">
                        <button class="choose-seats" type="submit">Choose seats</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- ==========Page-Title========== -->

    <!-- ==========Movie-Section========== -->
    @if (request()->date)
        <div class="seat-plan-section padding-bottom padding-top" id="seat">
            <div class="container">
                <div class="screen-area">
                    <h4 class="screen">screen</h4>
                    <div class="screen-thumb">
                        <img src="{{ url('front-end') }}/images/movie/screen-thumb.png" alt="movie">
                    </div>
                    <h5 class="subtitle">Regular seats</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area">
                            @if (count($row_arr) >= 4)
                                @foreach (array_slice($row_arr, 0, 4) as $item)
                                    <li class="seat-line">
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                        <ul class="seat--area">
                                            <li class="front-seat">
                                                <ul>
                                                    @for ($i = 0; $i < 10; $i++)
                                                        <li class="single-seat">
                                                            <img src="{{ url('front-end') }}/images/movie/seat01.png"
                                                                alt="seat">
                                                            <span class="sit-num"
                                                                style="text-transform: uppercase; font-weight:bold; {{ in_array($item . $i + 1, $check_seat) ? 'color:red;' : '' }}{{ in_array($item . $i + 1, $update_seat) ? 'color:green;' : '' }}">{{ $item . $i + 1 }}</span>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </li>
                                        </ul>
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                    </li>
                                @endforeach
                            @else
                                @foreach ($row_arr as $item)
                                    <li class="seat-line">
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                        <ul class="seat--area">
                                            <li class="front-seat">
                                                <ul>
                                                    @for ($i = 0; $i < 10; $i++)
                                                        <li class="single-seat">
                                                            <img src="{{ url('front-end') }}/images/movie/seat01.png"
                                                                alt="seat">
                                                            <span class="sit-num"
                                                                style="text-transform: uppercase; font-weight:bold; {{ in_array($item . $i + 1, $check_seat) ? 'color:red' : '' }}{{ in_array($item . $i + 1, $update_seat) ? 'color:green;' : '' }}">{{ $item . $i + 1 }}</span>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </li>
                                        </ul>
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <h5 class="subtitle">VIP seat</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area couple">
                            @if (count($row_arr) >= 8)
                                @foreach (array_slice($row_arr, 4, 4) as $item)
                                    <li class="seat-line">
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                        <ul class="seat--area">
                                            <li class="front-seat">
                                                <ul>
                                                    @for ($i = 0; $i < 10; $i++)
                                                        <li class="single-seat">
                                                            <img src="{{ url('front-end') }}/images/movie/seat01.png"
                                                                alt="seat">
                                                            <span class="sit-num"
                                                                style="text-transform: uppercase; font-weight:bold; {{ in_array($item . $i + 1, $check_seat) ? 'color:red' : '' }}{{ in_array($item . $i + 1, $update_seat) ? 'color:green;' : '' }}">{{ $item . $i + 1 }}</span>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </li>
                                        </ul>
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                    </li>
                                @endforeach
                            @elseif(count($row_arr)>4 && count($row_arr)<8) @foreach (array_slice($row_arr, 4) as $item)
                                    <li class="seat-line">
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                        <ul class="seat--area">
                                            <li class="front-seat">
                                                <ul>
                                                    @for ($i = 0; $i < 10; $i++)
                                                        <li class="single-seat">
                                                            <img src="{{ url('front-end') }}/images/movie/seat01.png"
                                                                alt="seat">
                                                            <span class="sit-num"
                                                                style="text-transform: uppercase; font-weight:bold; {{ in_array($item . $i + 1, $check_seat) ? 'color:red' : '' }}{{ in_array($item . $i + 1, $update_seat) ? 'color:green;' : '' }}">{{ $item . $i + 1 }}</span>
                                                        </li>
                                                    @endfor
                                                </ul>
                                            </li>
                                        </ul>
                                        <span style="text-transform: uppercase">{{ $item }}</span>
                                    </li>
                            @endforeach
    @endif
    </ul>
    </div>
    <h5 class="subtitle">Couple seats</h5>
    <div class="screen-wrapper">
        <ul class="seat-area">
            @if (count($row_arr) > 8)
                @foreach (array_slice($row_arr, 8) as $item)
                    <li class="seat-line">
                        <span style="text-transform: uppercase">{{ $item }}</span>
                        <ul class="seat--area">
                            <li class="front-seat">
                                <ul>
                                    @for ($i = 0; $i < 10; $i++)
                                        <li class="single-seat">
                                            <img src="{{ url('front-end') }}/images/movie/seat02-free.png" alt="seat">
                                            <span class="sit-num"
                                                style="text-transform: uppercase; font-weight:bold; {{ in_array($item . $i + 1, $check_seat) ? 'color:red' : '' }}{{ in_array($item . $i + 1, $update_seat) ? 'color:green;' : '' }}">{{ $item . $i + 1 }}</span>
                                        </li>
                                    @endfor
                                </ul>
                            </li>
                        </ul>
                        <span style="text-transform: uppercase">{{ $item }}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    </div>
    <div class="proceed-book bg_img" data-background="{{ url('front-end') }}/images/movie/movie-bg-proceed.jpg">
        <div class="proceed-to-book">
            <div class="book-item">
                <span>You have Chosen Seat</span>
                <h3 class="title" id="chosen"></h3>
            </div>
            {{-- <div class="book-item">
                            <span>total price</span>
                            <h3 class="title">$150</h3>
                        </div> --}}
            <div class="book-item">
                <button href="" class="custom-button" id="proceed">checkout</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endif

    <!-- ==========Movie-Section========== -->
@stop

@section('script')
    <script>
        let chosen = JSON.parse($('.update-seat').text());
        $('#chosen').html(chosen.join(',').toUpperCase());
        // ajax choose cinema 
        $('select[name=cinema]').change(function() {
            let cinema = $(this).val();
            let date = $('select[name=date]').val();
            let id = $('input[name=id]').val();
            let time = $('select[name=time]').val();
            $('#seat, #time, .choose-seat').css({
                display: 'none'
            });
            let html =
                `<select class="select-bar" name="date"><option value="" selected disabled>Choose date</option>`;
            $.ajax({
                url: '/ajax/book-cinema',
                data: {
                    cinema: cinema,
                    id: id
                },
                success: function(data) {
                    if (data[0] == null) {
                        html = '';
                    } else {
                        data.forEach(item => {
                            html +=
                                `<option value="${item.date}" style="color:black">${item.date}</option>`;
                        });
                    }
                    if (html == '') {
                        html = '<p>No time at this day!</p>'
                    } else {
                        html += `</select>`;
                    }
                    // console.log(html);
                    $('#date').html(html);
                }
            });
        });

        // ajax choose date 
        $('#date').change(function() {
            let date = $('select[name=date]').val();
            let cinema = $('select[name=cinema]').val();
            let id = $('input[name=id]').val();
            let time = $('select[name=time]').val();
            $('#seat').css({
                display: 'none'
            });
            $('#time').css({
                display: 'block'
            });
            if (!time) {
                $('.choose-seats').css({
                    display: 'none'
                });
            }
            let html =
                `<select class="select-bar" name="time"><option value="" selected disabled>Choose time</option>`;
            $.ajax({
                url: '/ajax/book-date',
                data: {
                    date: date,
                    id: id,
                    cinema: cinema
                },
                success: function(data) {
                    if (data[0] == null) {
                        html = '';
                    } else {
                        data.forEach(item => {
                            html +=
                                `<option value="${item.id}" style="color:black">${item.time}</option>`;
                        });
                    }
                    if (html == '') {
                        html = '<p>No time at this day!</p>'
                    } else {
                        html += `</select>`;
                    }
                    // console.log(html);
                    $('#time').html(html);
                }
            });
        });

        $('#time').change(function() {
            $('.choose-seats').css({
                display: 'inline-block'
            });
            $('#seat').css({
                display: 'none'
            });
        });

        // choose seat 
        $('.single-seat').click(function() {
            let check = $(this).children('span').attr('style');
            let seat = $(this).children('span').text();
            // alert(check.includes('red'));
            if (check.includes('red')) {
                Swal.fire('Oops...', 'This seat is chosen!', 'error');
            } else if (check.includes('green')) {
                $(this).children('span').css({
                    color: 'white'
                });
                chosen = chosen.filter(function(item){
                    return item != seat;
                });
                html = chosen.join(',');
                $('#chosen').html(html.toUpperCase());
            } else {
                $(this).children('span').css({
                    color: 'green'
                });
                chosen.push(seat);
                html = chosen.join(',');
                $('#chosen').html(html.toUpperCase());
            }
        });

        // proceed 
        $('#proceed').click(function() {
            let date = $('select[name=date]').val();
            let cinema = $('select[name=cinema]').val();
            let id = $('input[name=id]').val();
            let time = $('select[name=time]').val();
            if (!chosen[0]) {
                Swal.fire('Oops...', 'Please choose seat!', 'error');
            } else {
                $.ajax({
                    url: '/ajax/book',
                    data: {
                        chosen: chosen,
                        id: id,
                        cinema: cinema,
                        date: date,
                        time: time
                    },
                    success: function(data) {
                        console.log(data);
                        $('body').append(data);
                    }
                });
                Swal.fire({
                    position: 'mid',
                    icon: 'success',
                    title: 'Add to cart success!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>
@endsection
