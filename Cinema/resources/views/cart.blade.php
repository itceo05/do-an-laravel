<style>
    .choose-seats {
        background-image: -webkit-linear-gradient(169deg, #5560ff 17%, #aa52a1 63%, #ff4343 100%);
        padding: 10px 49px;
        font-weight: 600;
        border-radius: 25px;
        display: block;
    }

    .choose-seats:hover {
        -webkit-box-shadow: 0px 10px 15px 0px rgba(59, 55, 188, 0.5);
        box-shadow: 0px 10px 15px 0px rgba(59, 55, 188, 0.5);
    }

    .movie {
        padding: 20px;
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
    <!-- ==========Movie-Section========== -->
    <div class="ticket-plan-section padding-bottom padding-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 mb-5 mb-lg-0">
                    <ul class="seat-plan-wrapper bg-five">
                        @foreach ($list as $key => $item)
                            <li class="active">
                                <div class="movie-name">
                                    <img src="{{ url('Uploads') }}/{{ $item['detail']->film->image }}" alt=""
                                        style="max-width: 100px">
                                    <a href="{{ route('film-detail', $item['detail']->film_id) }}"
                                        class="name">{{ $item['detail']->film->name }}</a>
                                </div>
                                <div class="movie-schedule">
                                    <div class="update" style="margin: 0 auto">
                                        <a href="{{ route('book', [$item['detail']->film->slug, 'id' => $item['detail']->film_id, 'date' => $item['detail']->date, 'time' => $item['detail']->time_id, 'cinema' => $item['detail']->cinema_id]) }}"
                                            class="choose-seats" type="submit" style="color: white">Update</a>
                                    </div>
                                    <div class="update" style="margin: 0 auto">
                                        <a href="{{ route('remove-film', $key) }}" class="choose-seats" type="submit" style="color: white">Remove</a>
                                    </div>
                                    <div class="">
                                        Cinema: {{ $item['detail']->cinema->name }} <br>
                                        Date: {{ $item['detail']->date }} <br>
                                        Time: {{ $item['detail']->time->time }} <br>
                                        Price: {{ $item['price'] }}$ <br>
                                        Seat:{{ strtoupper(implode(',', $item['seat'])) }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        @foreach ($food as $key => $item)
                            <form class="" action="
                                        {{ route('update-food', $item['pro']->id) }}" method="POST">
                                        @csrf
                            <li class="active">
                                <div class="movie-name">
                                    <img src="{{ url('Uploads') }}/{{ $item['pro']->image }}" alt=""
                                        style="max-width:100px">
                                    <a href="{{ route('food') }}" class="name">{{ $item['pro']->name }}</a>
                                </div>

                                <div class="movie-schedule">
                                    <div class="update" style="margin: 0 auto;">
                                        <button type="submit" class="choose-seats">Update</button>
                                    </div>
                                    <div class="update" style="margin: 0 auto;">
                                        <a href="{{ route('remove-food', $key) }}" class="choose-seats" type="submit" style="color: white">Remove</a>
                                    </div>
                                    <div class="" style="width:100%; padding-bottom: 10px;">
                                        <div class="row">
                                            <div class="col-md-8">Price: {{ $item['price'] }} $</div>
                                            <div class="col-md-4">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qty"
                                                        value="{{ $item['qty'] }}">
                                                </div>
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>
                            </li>
                            </form>
                        @endforeach
                    </ul>
                </div>
                <div class="
                                                    col-lg-10 mb-5 mb-lg-0">
                    <a href="{{ route('checkout') }}" class="choose-seats text-center"
                        style="width: 100%; margin-top: 50px; color: white; font-weight:bold; font-size: 30px">CHECK
                        OUT</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->
@endsection
