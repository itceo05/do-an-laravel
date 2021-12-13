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
</style>
@extends('back-end.master')
@section('Main_Admin')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{url('Uploads')}}/{{(Auth::user()->image == '')? 'user.jpg' : Auth::user()->image}}"
                                        alt="profile" class="img-lg rounded-circle mb-3">
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
                                        <span class="float-right text-muted">
                                            {{(Auth::user()->phone == '')? 'NULL' : Auth::user()->phone}} </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left"> Mail </span>
                                        <span class="float-right text-muted"> {{Auth::user()->email}} </span>
                                    </p>
                                </div>
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
                                <div class="col-lg-12 d-flex align-items-center justify-content-center mt-3">
                                    <div class="auth-form-transparent text-left">
                                        <form action="{{route('post_editProfile')}}" class="pt-3" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="role" value="0">
                                            <input type="hidden" name="oldImage" value="{{Auth::user()->image}}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Avatar</label>
                                                <div class="input-group col-xs-12">
                                                    <input type="file" class="form-control file-upload-info"
                                                        placeholder="Upload Image" name="image" multiple>
                                                    <span class="input-group-append">
                                                        <button type="button"
                                                            class="btn btn-gradient-primary btn-icon-text">
                                                            <i class="mdi mdi-upload btn-icon-prepend"></i> Avatar
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-transparent">
                                                        <span class="input-group-text bg-transparent border-right-0">
                                                            <i class="mdi mdi-account-outline text-primary"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control form-control-lg border-left-0 {{($errors->has('name'))? 'error' : ''}}"
                                                        id="" placeholder="Username" name="name"
                                                        value="{{Auth::user()->name}}">
                                                </div>
                                                @if($errors->has('name'))
                                                <div class="alert-back mt-2" role="alert">
                                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                        {{$errors->first('name')}}</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-transparent">
                                                        <span class="input-group-text bg-transparent border-right-0">
                                                            <i class="mdi mdi-email-outline text-primary"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control form-control-lg border-left-0 {{($errors->has('email'))? 'error' : ''}}"
                                                        id="" placeholder="Username" name="email"
                                                        value="{{Auth::user()->email}}">
                                                </div>
                                                @if($errors->has('email'))
                                                <div class="alert-back mt-2" role="alert">
                                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                        {{$errors->first('email')}}</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Phone</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-transparent">
                                                        <span class="input-group-text bg-transparent border-right-0">
                                                            <i class="mdi mdi-cellphone text-primary"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control form-control-lg border-left-0 {{($errors->has('phone'))? 'error' : ''}}"
                                                        id="" placeholder="Username" name="phone"
                                                        value="{{Auth::user()->phone}}">
                                                </div>
                                                @if($errors->has('phone'))
                                                <div class="alert-back mt-2" role="alert">
                                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                        {{$errors->first('phone')}}</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword">Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-transparent">
                                                        <span class="input-group-text bg-transparent border-right-0">
                                                            <i class="mdi mdi-lock-outline text-primary"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password"
                                                        class="form-control form-control-lg border-left-0"
                                                        id="exampleInputPassword" placeholder="Password"
                                                        name="password">
                                                </div>
                                                @if($errors->has('password'))
                                                <div class="alert-back mt-2" role="alert">
                                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                        {{$errors->first('password')}}</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword">Confirm Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend bg-transparent">
                                                        <span class="input-group-text bg-transparent border-right-0">
                                                            <i class="mdi mdi-lock-outline text-primary"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password"
                                                        class="form-control form-control-lg border-left-0 {{($errors->has('confirm_password'))? 'error' : ''}}"
                                                        id="exampleInputPassword" placeholder="Confirm Password"
                                                        name="confirm_password">
                                                </div>
                                                @if($errors->has('confirm_password'))
                                                <div class="alert-back mt-2" role="alert">
                                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                        {{$errors->first('confirm_password')}}</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="my-3">
                                                <button type="submit"
                                                    class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Submit</button>
                                            </div>
                                        </form>
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
</div>
@stop