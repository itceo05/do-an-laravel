@extends('master')
@section('main')
    <div class="movie-facility padding-bottom padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="booking-summery bg-one">
                        <h4 class="title">History</h4>
                        @foreach ($history as $item)
                            <ul>
                                <li>
                                    <h6 class="subtitle" style="color: red">Date:
                                        {{ date_format($item->created_at, 'Y/m/d') }}</h6>
                                    <span class="info"></span>
                                </li>
                                @foreach ($item->book_ticket_detail as $value)
                                    @if (isset($value->time_id))
                                        <li>
                                            <h6 class="subtitle">
                                                <span>{{ $time->where('id', $value->time_id)->first()->film->name }}</span><span>{{ $value->quantity }}</span>
                                            </h6>
                                            <div class="info"><span></span> <span>Tickets</span></div>
                                        </li>
                                    @else
                                        <li>
                                            <h6 class="subtitle">
                                                <span>{{ $food->where('id', $value->food_id)->first()->name }}</span><span>{{ $value->quantity }}</span>
                                            </h6>
                                            <div class="info"><span></span>
                                                <span>products</span></div>
                                        </li>
                                    @endif
                                @endforeach
                                <li>
                                    <h6 class="subtitle mb-0"><span>Total
                                            price</span><span>{{ number_format($item->price) }}$</span></h6>
                                </li>
                            </ul>
                        @endforeach
                        {{-- <ul class="side-shape">
                            <li>
                                <h6 class="subtitle"><span>combos</span><span>$57</span></h6>
                                <span class="info"><span>2 Nachos Combo</span></span>
                            </li>
                            <li>
                                <h6 class="subtitle"><span>food & bevarage</span></h6>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <span class="info"><span>price</span><span>$207</span></span>
                                <span class="info"><span>vat</span><span>$15</span></span>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
