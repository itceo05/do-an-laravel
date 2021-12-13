@extends('master')
@section('main')
    <section class="account-section bg_img" data-background="assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">welcome</span>
                        <h2 class="title">to Boleto </h2>
                        <p style="margin-top: 10px">Please enter your email you have registered!</p>
                    </div>
                    <form action="" class="account-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name1">Email<span>*</span></label>
                            <input type="text" placeholder="Enter Your Email" id="" name="email"
                                value="{{ old('email') }}">
                        </div>
                        @if ($errors->has('email'))
                            <small class="err col-md-12">{{ $errors->first('email') }}</small>
                        @endif
                        <div class="form-group text-center">
                            <input type="submit" value="Next">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
