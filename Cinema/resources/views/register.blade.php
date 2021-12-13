@extends('master')
@section('main')
    <section class="account-section bg_img" data-background="assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">welcome</span>
                        <h2 class="title">to Boleto </h2>
                    </div>
                    <form action="{{ route('post_register') }}" class="account-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email1">Name<span>*</span></label>
                            <input type="text" placeholder="Enter Your Name" name="name" id="" value="{{ old('name') }}">
                        </div>
                        @if ($errors->has('name'))
                            <small class="err col-md-12">{{ $errors->first('name') }}</small>
                        @endif
                        <div class="form-group">
                            <label for="name1">Email<span>*</span></label>
                            <input type="text" placeholder="Enter Your Email" id="" name="email"
                                value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <small class="err col-md-12">{{ $errors->first('email') }}</small>
                        @endif
                        <div class="form-group">
                            <label for="pass1">Password<span>*</span></label>
                            <input type="password" placeholder="Password" id="" name="password">
                            @if ($errors->has('password'))
                                <small class="err col-md-12">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="pass2">Confirm Password<span>*</span></label>
                            <input type="password" placeholder="Password" id="" name="password_confirmation">
                        </div>
                        <div class="form-group checkgroup">
                            <input type="checkbox" id="bal" required checked>
                            <label for="bal">I agree to the <a href="">Terms, Privacy Policy</a> and <a
                                    href="#0">Fees</a></label>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Sign Up">
                        </div>
                    </form>
                    <div class="option">
                        Already have an account? <a href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="or"><span>Or</span></div>
                    <ul class="social-icons">
                        <li>
                            <a href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="active">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop
