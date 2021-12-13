<style>
.contents {
    word-break: break-all;
}
</style>
@extends('master')
@section('main')
<section class="blog-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-lg-8 mb-50 mb-lg-0">
                <article>
                    <div class="post-item post-details">
                        <div class="post-thumb">
                            <img src="{{ url('Uploads') }}/{{ $blog->image }}" alt="blog">
                        </div>
                        <div class="post-content">
                            <div class="post-meta text-center">
                                <div class="item">
                                    <a href="">
                                        <i class="flaticon-conversation"></i>
                                        <span>{{ count($blog->comment->where('status', 1)) }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                {{-- <div class="entry-content p-0">
                                        <div class="left">
                                            <span class="date">Dece 15, 2020 BY </span>
                                        </div>
                                    </div> --}}
                                <div class="post-header">
                                    <h4 class="m-title">
                                        {{ $blog->title }}
                                    </h4>
                                    <div class="contents">
                                        {!! $blog->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        {{-- <div class="author-thumb">
                                <a href="#0">
                                    <img src="assets/images/blog/author.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="author-content">
                                <h5 class="title">
                                    <a href="#0">
                                        Lee Burke
                                    </a>
                                </h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dunt ut
                                    labore et dolore magna aliqua.Quis ipsum suspendisse .
                                </p>
                            </div> --}}
                    </div>
                    <div class="blog-comment">
                        <h5 class="title">comments</h5>
                        <ul class="comment-area">
                            @foreach ($cmt as $item)
                            <li>
                                {{-- <div class="blog-thumb">
                                        <a href="#0">
                                            <img src="assets/images/blog/author.jpg" alt="blog">
                                        </a>
                                    </div> --}}
                                <div class="blog-thumb-info">
                                    {{-- <span>13 days ago</span> --}}
                                    <h6 class="title"><a href="#0">{{ $item->user->name }}:</a></h6>
                                </div>
                                <div class="blog-content">
                                    <p>
                                        {{ $item->content }}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="leave-comment">
                            <h5 class="title">leave comment</h5>
                            @if (Auth::check())
                            <form class="blog-form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea placeholder="Write A Message" name="mess"></textarea>
                                </div>
                                @if ($errors->has('mess'))
                                <small class="err col-md-12">Please write something!</small>
                                @endif
                                <div class="form-group">
                                    <input type="submit" value="Submit Now">
                                </div>
                            </form>
                            @else
                            <p class="text-center" style="font-size: 20px;">Please sign in to comment! <a
                                    href="{{ route('login', ['comment' => $blog->id]) }}">Sign in</a></p>
                            @endif
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection