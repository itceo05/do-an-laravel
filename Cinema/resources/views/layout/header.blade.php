<header class="header-section">
    <div class="container-fluid">
        <div class="header-wrapper">
            <div class="logo">
                <a href="">
                    <img src="{{ url('Uploads') }}/{{ $logo->where('status', 1)->first()->image }}" alt="logo">
                </a>
            </div>
            <ul class="menu">
                <li>
                    <a href="{{ route('index') }}"
                        class="{{ Str::of(request()->url())->exactly('http://localhost:8000') == 1 ? 'active' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('movie') }}"
                        class="{{ Str::contains(request()->url(), 'movie') == 1 ? 'active' : '' }}">movies</a>
                    {{-- <ul class="submenu">
                        <li>
                            <a href="movie-grid.html">Movie Grid</a>
                        </li>
                        <li>
                            <a href="movie-list.html">Movie List</a>
                        </li>
                        <li>
                            <a href="movie-details.html">Movie Details</a>
                        </li>
                        <li>
                            <a href="movie-details-2.html">Movie Details 2</a>
                        </li>
                        <li>
                            <a href="movie-ticket-plan.html">Movie Ticket Plan</a>
                        </li>
                        <li>
                            <a href="movie-seat-plan.html">Movie Seat Plan</a>
                        </li>
                        <li>
                            <a href="movie-checkout.html">Movie Checkout</a>
                        </li>
                        <li>
                            <a href="popcorn.html">Movie Food</a>
                        </li>
                    </ul> --}}
                </li>
                <li>
                    <a href="{{ route('food') }}"
                        class="{{ Str::contains(request()->url(), 'food') == 1 ? 'active' : '' }}">food</a>
                </li>
                <li>
                    <a href="{{ route('blog') }}"
                        class="{{ Str::contains(request()->url(), 'blog') == 1 ? 'active' : '' }}">blog</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="{{ Str::contains(request()->url(), 'contact') == 1 ? 'active' : '' }}">contact</a>
                </li>
                <li>
                    <a href="{{ route('cart') }}"
                        class="{{ Str::contains(request()->url(), 'cart') == 1 ? 'active' : '' }}">cart</a>
                </li>
                @if (Auth::check())
                    <li class="header-button pr-0">
                        <a href="{{ route('index') }}">Welcome, {{ Auth::user()->name }}</a>
                    </li>
                    <li class="header-button pr-0">
                        <a href="{{ route('history', Auth::user()->id) }}">History</a>
                    </li>
                    <li class="header-button pr-0">
                        <a href="{{ route('logout_user') }}">Logout</a>
                    </li>
                @else
                    <li class="header-button pr-0">
                        <a href="{{ route('login') }}">sign in</a>
                    </li>
                @endif
            </ul>
            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
