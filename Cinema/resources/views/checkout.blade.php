@extends('master')
@section('main')
    <div class="movie-facility padding-bottom padding-top">
        <div class="container">
            <div class="row">
                @if (Auth::check())
                    <div class="col-lg-8">
                        <div class="checkout-widget checkout-contact">
                            <h5 class="title">Share your Contact Details </h5>
                            <form class="checkout-contact-form" action="{{ route('customer.contact-info') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" placeholder="Enter your Address" name="address">
                                    @if ($errors->has('phone'))
                                        <small class="err col-md-12">{{ $errors->first('address') }}</small>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Continue" class="custom-button">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter your Mail" name="email"
                                        value="{{ Auth::user()->email }}">
                                    @if ($errors->has('email'))
                                        <small class="err col-md-12">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter your Phone Number " name="phone">
                                    @if ($errors->has('phone'))
                                        <small class="err col-md-12">{{ $errors->first('phone') }}</small>
                                    @endif
                                </div>
                            </form>
                        </div>
                        {{-- <div class="checkout-widget checkout-contact">
                            <h5 class="title">Promo Code </h5>
                            <form class="checkout-contact-form">
                                <div class="form-group">
                                    <input type="text" placeholder="Please enter promo code">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Verify" class="custom-button">
                                </div>
                            </form>
                        </div>
                        <div class="checkout-widget checkout-card mb-0">
                            <h5 class="title">Payment Option </h5>
                            <ul class="payment-option">
                                <li class="active">
                                    <a href="#0">
                                        <img src="assets/images/payment/card.png" alt="payment">
                                        <span>Credit Card</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <img src="assets/images/payment/card.png" alt="payment">
                                        <span>Debit Card</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <img src="assets/images/payment/paypal.png" alt="payment">
                                        <span>paypal</span>
                                    </a>
                                </li>
                            </ul>
                            <h6 class="subtitle">Enter Your Card Details </h6>
                            <form class="payment-card-form">
                                <div class="form-group w-100">
                                    <label for="card1">Card Details</label>
                                    <input type="text" id="card1">
                                    <div class="right-icon">
                                        <i class="flaticon-lock"></i>
                                    </div>
                                </div>
                                <div class="form-group w-100">
                                    <label for="card2"> Name on the Card</label>
                                    <input type="text" id="card2">
                                </div>
                                <div class="form-group">
                                    <label for="card3">Expiration</label>
                                    <input type="text" id="card3" placeholder="MM/YY">
                                </div>
                                <div class="form-group">
                                    <label for="card4">CVV</label>
                                    <input type="text" id="card4" placeholder="CVV">
                                </div>
                                <div class="form-group check-group">
                                    <input id="card5" type="checkbox" checked>
                                    <label for="card5">
                                        <span class="title">QuickPay</span>
                                        <span class="info">Save this card information to my Boleto  account and make faster payments.</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="custom-button" value="make payment">
                                </div>
                            </form>
                            <p class="notice">
                                By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>
                            </p>
                        </div> --}}
                    </div>
                    <div class="col-lg-4">
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
                                    {{ number_format($cart->get_total_price(), 2) }}</span></h6>
                            <a href="{{ route('post-checkout') }}" class="custom-button back-button">proceed</a>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <div class="checkout-widget d-flex flex-wrap align-items-center justify-cotent-between">
                            <div class="title-area">
                                <h5 class="title">You need to sign in!</h5>
                                <p>Sign in to earn points and make booking easier!</p>
                            </div>
                            <a href="{{ route('login', ['checkout']) }}" class="sign-in-area">
                                <i class="fas fa-user"></i><span>Sign in</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
