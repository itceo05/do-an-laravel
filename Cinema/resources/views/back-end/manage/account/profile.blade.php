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

.btn-handle {
    margin-top: -15px;
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
                                    <img src="{{url('Uploads')}}/{{($Auth->image == '')? 'user.jpg' : $Auth->image}}"
                                        alt="profile" class="img-lg rounded-circle mb-3">
                                    <p>Bureau Oberhaeuser is a design bureau focused on Information- and Interface
                                        Design. </p>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-gradient-success">Profile</button>
                                        <button class="btn btn-gradient-success">Customer</button>
                                    </div>
                                </div>
                                <div class="border-bottom py-4">
                                    <p>Decentralization</p>
                                    <div>
                                        <label class="badge badge-outline-dark">Customer</label>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left"> Position </span>
                                        <span class="float-right text-muted"> Customer </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left"> Phone </span>
                                        <span class="float-right text-muted">
                                            {{($Auth->phone == '')? 'NULL' : $Auth->phone}} </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left"> Mail </span>
                                        <span class="float-right text-muted"> {{$Auth->email}} </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3>{{$Auth->name}}</h3>
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 mr-2 text-muted">Customer</h5>
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
                                        <li class="nav-item mr-2">
                                            <button type="button" class="btn btn-outline-success btn-fw "
                                                id="btn-comment">
                                                <i class="mdi mdi-forum"></i> Comments </button>
                                        </li>
                                        <li class="nav-item mr-2">
                                            <button type="button" class="btn btn-outline-success btn-fw"
                                                id="btn-feedback">
                                                <i class="mdi mdi-bell-ring"></i> Feedbacks </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="btn btn-outline-success btn-fw"
                                                id="btn-review">
                                                <i class="mdi mdi-tooltip-outline"></i> Review </button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="div">
                                    @if($CountComment != 0)
                                    @foreach($listComment as $key => $value)
                                    <div class="d-flex align-items-start profile-feed-item border-bottom py-4">
                                        <img src="{{url('Uploads')}}/{{($Auth->image == '')? 'user.jpg' : $Auth->image}}"
                                            alt="profile" class="img-sm rounded-circle">
                                        <div class="ml-4">
                                            <h6> {{$Auth->name}} <small class="ml-4 text-muted"><i
                                                        class="mdi mdi-clock mr-1"></i>{{$TimeComment[$key]}}</small>
                                            </h6>
                                            <p> {{$value->content}}</p>
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
                                        <h4 class="card-title">Comments</h4>
                                        <p class="card-description">No comments have been posted yet.</p>
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
</div>
@stop

@section('script')
<script>
$(document).ready(function() {
    $('#btn-comment').click(function() {
        $('#div').html(`@if($CountComment != 0)
                                    @foreach($listComment as $key => $value)
                                    <div class="d-flex align-items-start profile-feed-item border-bottom py-4">
                                        <img src="{{url('Uploads')}}/{{($Auth->image == '')? 'user.jpg' : $Auth->image}}"
                                            alt="profile" class="img-sm rounded-circle">
                                        <div class="ml-4">
                                            <h6> {{$Auth->name}} <small class="ml-4 text-muted"><i
                                                        class="mdi mdi-clock mr-1"></i>{{$TimeComment[$key]}}</small>
                                            </h6>
                                            <p> {{$value->content}}</p>
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
                                        <h4 class="card-title">Comments</h4>
                                        <p class="card-description">No comments have been posted yet.</p>
                                    </div>
                                    @endif`);
    });
    $('#btn-feedback').click(function() {
        $('#div').html(`@if($CountFeedback != 0)
                                    @foreach($listFeedback as $key => $value)
                                    <div class="d-flex align-items-start profile-feed-item border-bottom py-4">
                                        <img src="{{url('Uploads')}}/{{($Auth->image == '')? 'user.jpg' : $Auth->image}}"
                                            alt="profile" class="img-sm rounded-circle">
                                        <div class="ml-4">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <h6> {{$Auth->name}} <small class="ml-4 text-muted"><i
                                                                class="mdi mdi-clock mr-1"></i>{{$TimeFeedback[$key]}}</small>
                                                    </h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-right btn-handle">
                                                        @if($value->status == 1)
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-icon-text">
                                                            <i class="mdi mdi-bell-ring btn-icon-prepend"></i> Incomplete
                                                        </button>
                                                        @else
                                                        <button type="button"
                                                            class="btn btn-outline-success btn-icon-text">
                                                            <i class="mdi mdi-bell-ring btn-icon-prepend"></i> Completed
                                                        </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3"> {{$value->content}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-12 text-center mt-5">
                                        <h4 class="card-title">Feedbacks</h4>
                                        <p class="card-description">No feedbacks have been posted yet.</p>
                                    </div>
                                    @endif`);
    });
    $('#btn-review').click(function() {
        $('#div').html(`@if($CountReview != 0)
                                    @foreach($listReview as $key => $value)
                                    <div class="d-flex align-items-start profile-feed-item border-bottom py-4">
                                        <img src="{{url('Uploads')}}/{{($Auth->image == '')? 'user.jpg' : $Auth->image}}"
                                            alt="profile" class="img-sm rounded-circle">
                                        <div class="ml-4">
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <h6> {{$Auth->name}} <small class="ml-4 text-muted"><i
                                                                class="mdi mdi-clock mr-1"></i>{{$TimeReview[$key]}}</small>
                                                    </h6>
                                                </div>
                                            </div>
                                            <p class=""> {{$value->content}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-12 text-center mt-5">
                                        <h4 class="card-title">Reviews</h4>
                                        <p class="card-description">No reviews have been posted yet.</p>
                                    </div>
                                    @endif`);
    });
});
</script>
@stop