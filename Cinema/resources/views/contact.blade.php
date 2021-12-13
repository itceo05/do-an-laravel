@extends('master')
@section('main')
    <section class="contact-section padding-top">
        <div class="contact-container">
            <div class="bg-thumb bg_img" data-background="assets/images/contact/contact.jpg"></div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <div class="section-header-3 left-style">
                            <span class="cate">contact us</span>
                            <h2 class="title">get in touch</h2>
                            <p>We’d love to talk about how we can work together. Send us a message below and we’ll respond
                                as soon as possible.</p>
                        </div>
                        @if (Auth::check())
                            <form class="contact-form" id="contact_form_submit" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Message <span>*</span></label>
                                    <textarea name="mess" id="message" placeholder="Enter Your Message"></textarea>
                                </div>
                                @if ($errors->has('mess'))
                                    <small class="err col-md-12">Please write something!</small>
                                @endif
                                <div class="form-group">
                                    <input type="submit" value="Send Message">
                                </div>
                            </form>
                        @else
                            <h5>Please sign in to send feedback! <a href="{{ route('login', 'contact') }}"
                                    style="color: red">Sign in</a></h5>
                        @endif
                    </div>
                    <div class="col-md-5 col-lg-6">
                        <div class="padding-top padding-bottom contact-info">
                            @foreach ($contact as $item)
                                @if ($item->user->role == 0)
                                    <div class="info-area">
                                        <div class="info-item">
                                            <div class="info-thumb">
                                                <img src="{{ url('front-end') }}/images/contact/contact01.png"
                                                    alt="contact">
                                            </div>
                                            <div class="info-content">
                                                <h6 class="title">phone number</h6>
                                                <a href="">+{{ $item->phone }}</a>
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-thumb">
                                                <img src="{{ url('front-end') }}/images/contact/contact02.png"
                                                    alt="contact">
                                            </div>
                                            <div class="info-content">
                                                <h6 class="title">Email</h6>
                                                <a href=""><span class="__cf_email__"
                                                        data-cfemail="dbb2b5bdb49b99b4b7beafb4">{{ $item->email }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
