<style>
.contents {
    word-break: break-all;
}
</style>
@extends('master')
@section('main')
<section class="blog-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-50 mb-lg-0">
                <article>
                    @foreach ($blog as $item)
                    <div class="post-item">
                        <div class="post-thumb">
                            <a href="{{ route('blog-detail', $item->id) }}">
                                <img src="{{ url('Uploads') }}/{{ $item->image }}" alt="blog">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-header">
                                <h4 class="title">
                                    <a href="{{ route('blog-detail', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                                <div class="meta-post">
                                    <a href="" class="mr-4"><i
                                            class="flaticon-conversation"></i>{{ count($item->comment->where('status', 1)) }}
                                        Comments</a>
                                </div>
                                <div class="contents">
                                    {!! Str::limit($item->content, 200) !!}
                                </div>
                            </div>
                            <div class="entry-content">
                                <a href="{{ route('blog-detail', $item->id) }}" class="buttons">Read More <i
                                        class="flaticon-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </article>
                <div class="pagination-area text-center">
                    {{ $blog->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection