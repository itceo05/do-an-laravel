<style>
    .date {
        display: inherit;
    }

</style>

<section class="search-ticket-section padding-top pt-lg-0">
    <div class="container">
        <div class="search-tab bg_img" data-background="{{ url('front-end') }}/images/ticket/ticket-bg01.jpg">
            <div class="row align-items-center mb--20">
                <div class="col-lg-6 mb-20">
                    <div class="search-ticket-header">
                        <h6 class="category">welcome to Boleto </h6>
                        <h3 class="title">what are you looking for</h3>
                    </div>
                </div>
                <div class="col-lg-6 mb-20">
                    <ul class="tab-menu ticket-tab-menu" id="sending">
                        <li class="active">
                            <div class="tab-thumb">
                                <img src="{{ url('front-end') }}/images/ticket/ticket-tab01.png" alt="ticket">
                            </div>
                            <span>movie</span>
                        </li>
                        {{-- <li>
                        <div class="tab-thumb">
                            <img src="{{ url('front-end') }}/images/ticket/ticket-tab02.png" alt="ticket">
                        </div>
                        <span>events</span>
                    </li>
                    <li>
                        <div class="tab-thumb">
                            <img src="{{ url('front-end') }}/images/ticket/ticket-tab03.png" alt="ticket">
                        </div>
                        <span>sports</span>
                    </li> --}}
                    </ul>
                </div>
            </div>
            <div class="tab-area">
                <div class="tab-item active">
                    <form class="ticket-search-form">
                        <div class="form-group large">
                            <input type="text" placeholder="Search for Movies" name="film">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="
                                    form-group">
                                <div class="thumb">
                                    <img src="{{ url('front-end') }}/images/ticket/cinema.png" alt="ticket">
                                </div>
                                <span class="type">cinema:</span>
                                <select class="select-bar" name="cinema">
                                    <option value="Awaken" disabled selected>Awaken</option>
                                    @foreach ($cinema as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="thumb">
                                    <img src="{{ url('front-end') }}/images/ticket/date.png" alt="ticket">
                                </div>
                                <span class="type">date:</span>
                                <div class="col-md-8">
                                    <input type="date" name="date"
                                        class="">
                                </div>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
