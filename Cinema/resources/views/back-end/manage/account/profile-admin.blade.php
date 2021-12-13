<style>
.Action {
    color: #000;
    font-size: 24px;
    margin-left: 10px;
}

.Action:hover {
    color: red;
}

.pagination {
    padding: 25px;
    justify-content: center;
}

.modal-4 a {
    margin: 0 5px;
    padding: 0;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 100%;
    background-color: #F7C12C;
    padding: 6px 10px;
    /* border: 1px solid #000; */
}

.modal-4 a.prev {
    -moz-border-radius: 50px 0 0 50px;
    -webkit-border-radius: 50px;
    border-radius: 50px 0 0 50px;
    width: 100px;
}

.modal-4 a.next {
    -moz-border-radius: 0 50px 50px 0;
    -webkit-border-radius: 0;
    border-radius: 0 50px 50px 0;
    width: 100px;
}

.modal-4 a:hover {
    background-color: #FFA500;
}

.modal-4 a.active,
.modal-4 a:active {
    background-color: #FFA100;
}

.comment {
    display: block;
    margin: 10px;
    color: red;
    font-size: 14px;
    border: 1px solid #000;
    background-color: yellow;
    padding: 5px;
}

.contents{
    word-break: break-all;
}
</style>
@extends('back-end.master')
@section('Main_Admin')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{url('Uploads')}}/{{(Auth::user()->image == '')? 'user.jpg' : Auth::user()->image}}" alt="profile"
                                        class="img-lg rounded-circle mb-3">
                                    <p>Bureau Oberhaeuser is a design bureau focused on Information- and Interface
                                        Design. </p>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-gradient-success">Profile</button>
                                        <button class="btn btn-gradient-success">Admin</button>
                                    </div>
                                </div>
                                <div class="border-bottom py-4">
                                    <p>Decentralization</p>
                                    <div>
                                        <label class="badge badge-outline-dark">Manager</label>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left"> Position </span>
                                        <span class="float-right text-muted"> Admin </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left"> Phone </span>
                                        <span class="float-right text-muted"> {{(Auth::user()->phone == '')? 'NULL' : Auth::user()->phone}} </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left"> Mail </span>
                                        <span class="float-right text-muted"> cinema.admin@gmail.com </span>
                                    </p>
                                </div>
                                <a href="{{route('EditProfile')}}" class="btn btn-gradient-primary btn-block">Update</a>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3>{{Auth::user()->name}}</h3>
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 mr-2 text-muted">Manager</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-secondary btn-icon">
                                            <i class="mdi mdi-comment-processing"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-4 py-2 border-top border-bottom">
                                    <ul class="nav profile-navbar">
                                        <li class="nav-item">
                                                <button type="button" class="btn btn-outline-success btn-fw active" id="btn-comment">
                                                <i class="mdi mdi-newspaper"></i> Blog </button>
                                        </li>

                                    </ul>
                                </div>
                                @if($Count != 0)
                                @foreach($listData as $value)
                                <div class="d-flex align-items-start profile-feed-item border-bottom py-4">
                                    <img src="{{url('Uploads')}}/{{(Auth::user()->image == '')? 'user.jpg' : Auth::user()->image}}" alt="profile"
                                        class="img-sm rounded-circle">
                                    <div class="ml-4">
                                        <h6> {{Auth::user()->name}} <small class="ml-4 text-muted"><i
                                                    class="mdi mdi-clock mr-1"></i>10 hours</small>
                                        </h6>
                                        <div class="contents">
                                        <span> {!! $value->content !!}</span>
                                        </div>
                                        <img src="{{url('Uploads')}}/{{$value->image}}" alt="sample"
                                            class="rounded mw-100">
                                        <p class="small text-muted mt-2 mb-0">
                                            <span>
                                                <i class="mdi mdi-star mr-1"></i>4 </span>
                                            <span class="ml-2">
                                                <i class="mdi mdi-comment mr-1"></i>11 </span>
                                            <span class="ml-2">
                                                <i class="mdi mdi-reply"></i>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="col-12 text-center mt-5">
                                    <h4 class="card-title">Posts</h4>
                                    <p class="card-description">No posts have been posted yet.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop