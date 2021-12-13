@extends('master')
@section('main')
    <div class="movie-facility padding-bottom padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($banner)
                        <div class="c-thumb padding-bottom">
                            <img src="{{ url('Uploads') }}/{{ $banner->image }}" alt="sidebar/banner" style="max-width: 200px">
                        </div>
                    @endif
                    <div class="section-header-3">
                        <span class="cate">You're hungry</span>
                        <h2 class="title">we have food</h2>
                        <p>Prebook Your Meal and Save More!</p>
                    </div>
                    <div class="grid--area">
                        <ul class="filter">
                            <li data-filter="*" class="active">all</li>
                            <li data-filter=".combos">combos</li>
                        </ul>
                        <div class="grid-area">
                            <div class="grid-item">
                                @foreach ($no_combo as $item)
                                    <div class="grid-inner">
                                        <div class="grid-thumb">
                                            <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="movie/popcorn">
                                            <div class="offer-tag">
                                                ${{ $item->price }}
                                            </div>
                                        </div>
                                        <div class="grid-content">
                                            <h5 class="subtitle">
                                                <a href="">
                                                    {{ $item->name }}
                                                </a>
                                            </h5>
                                            <form class="cart-button" action="{{ route('add-food', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qty" value="1">
                                                </div>
                                                <button type="submit" class="custom-button">
                                                    add
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="grid-item combos">
                                @foreach ($combo as $item)
                                    <div class="grid-inner">
                                        <div class="grid-thumb">
                                            <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="movie/popcorn">
                                            <div class="offer-tag">
                                                ${{ $item->price }}
                                            </div>
                                            <div class="offer-remainder">
                                                <span>combo</span>
                                            </div>
                                        </div>
                                        <div class="grid-content">
                                            <h5 class="subtitle">
                                                <a href="">
                                                    {{ $item->name }}
                                                </a>
                                            </h5>
                                            <form class="cart-button" action="{{ route('add-food', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qty" value="1">
                                                </div>
                                                <button type="submit" class="custom-button">
                                                    add
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @if(Auth::check())
                    <div class="booking-summery bg-one">
                        <h4 class="title">booking summery</h4>
                        @foreach ($cart->content() as $item)
                            <ul>
                                <li>
                                    <h6 class="subtitle">{{ $item['detail']->film->name }}</h6>
                                </li>
                                <li>
                                    <h6 class="subtitle"><span>{{ $item['detail']->cinema->name }}</h6>
                                    <div class="info">
                                        <span>{{ $item['detail']->date }},{{ $item['detail']->time->time }}</span>
                                    </div>
                                </li>
                                <li>
                                    <h6 class="subtitle">Seats: {{ implode(',', $item['seat']) }}</h6>
                                </li>
                                <li>
                                    <h6 class="info mb-0"><span>Tickets Price</span><span>$
                                            {{ number_format($item['price'], 2) }}</span></h6>
                                </li>
                            </ul>
                        @endforeach
                        @foreach ($cart->content_food() as $item)
                            <ul class="side-shape">
                                <li>
                                    <h6 class="subtitle"><span>{{ $item['pro']->name }}</span></h6>
                                    <span class="info"><span>Quantity: {{ $item['qty'] }}</span><span>$
                                        {{ number_format($item['price'], 2) }}</span></span>
                                </li>
                            </ul>
                        @endforeach
                        {{-- <ul>
                            <li>
                                <span class="info"><span>price</span><span>$207</span></span>
                                <span class="info"><span>vat</span><span>$15</span></span>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="proceed-area  text-center">
                        <h6 class="subtitle"><span>Amount Payable</span><span>$
                                {{ $cart->get_total_price() }}</span></h6>
                        <a href="{{ route('post-checkout') }}" class="custom-button back-button">proceed</a>
                    </div>
                    @endif
                    <div class="note">
                        <h5 class="title">Note :</h5>
                        <p>Please give us 15 minutes for F& B preparation  once you're at the cinema</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
