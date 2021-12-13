<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{route('dashboard.create')}}" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{url('Uploads')}}/{{(Auth::user()->image == '')? 'user.jpg' : Auth::user()->image}}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                    <span class="text-secondary text-small">Cinema Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard.index')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('cinema.index')}}">
                <span class="menu-title">Cinema</span>
                <i class="mdi mdi-map-marker-radius menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('movie-room.index')}}">
                <span class="menu-title">Movie Room</span>
                <i class="mdi mdi-office menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('movie-chair.index')}}">
                <span class="menu-title">Movie Chair</span>
                <i class="mdi mdi-seat-recline-extra menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('category.index')}}">
                <span class="menu-title">Film Category</span>
                <i class="mdi mdi-image-filter-frames menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('film.index')}}">
                <span class="menu-title">Film</span>
                <i class="mdi mdi-television-guide menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('time.index')}}">
                <span class="menu-title">Time</span>
                <i class="mdi mdi-clock menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('show-time.index')}}">
                <span class="menu-title">Showtimes</span>
                <i class="mdi mdi-clock-fast menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('blog.index')}}">
                <span class="menu-title">Posts</span>
                <i class="mdi mdi-table-edit menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('food.index')}}">
                <span class="menu-title">Food</span>
                <i class="mdi mdi-food menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('bill')}}">
                <span class="menu-title">Bills</span>
                <i class="mdi mdi-cart-arrow-down menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{Route('account')}}">
                <span class="menu-title">Accounts</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{Route('comment')}}">
                <span class="menu-title">Comments</span>
                <i class="mdi mdi-forum menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{Route('review.index')}}">
                <span class="menu-title">Reviews</span>
                <i class="mdi mdi-tooltip-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{Route('feedback')}}">
                <span class="menu-title">Feedback</span>
                <i class="mdi mdi-bell-ring menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('banner.index')}}">Banner</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('contact-info.index')}}">Contact Info</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('logo.index')}}">Logo</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{Route('recycle-bin')}}">
                <span class="menu-title">Recycle Bin</span>
                <i class="mdi mdi-cube-outline menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>