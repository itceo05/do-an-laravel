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

.ImaPro {
    border-radius: 0 !important;
    height: auto !important;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
@extends('back-end.master')
@section('Main_Admin')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('Messages'))
                        <div class="alert alert-primary" role="alert">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;"> {{Session::get('Messages')}}
                                </font>
                            </font>
                        </div>
                        @endif
                        <form action="{{route('food.update', $finbyId->id)}}" class="forms-sample" method="POST"
                            enctype="multipart/form-data">
                            @METHOD('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{$finbyId->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name</label>
                                        <input type="text" class="form-control {{($errors->has('name'))? 'error' : ''}}"
                                            name="name" id="exampleInputUsername1" placeholder="Food Name" value="{{$finbyId->name}}">
                                        @if($errors->has('name'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('name')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Combo</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="combo"
                                                            id="membershipRadios1" value="1" {{($finbyId->combo == 1)? 'checked' : ''}}> No Combo <i
                                                            class="input-helper"></i><i
                                                            class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="combo"
                                                            id="membershipRadios2" value="2" {{($finbyId->combo == 2)? 'checked' : ''}}> Combo <i
                                                            class="input-helper"></i><i
                                                            class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Image Upload</label>
                                <div class="input-group col-xs-12">
                                    <input type="file"
                                        class="form-control file-upload-info {{($errors->has('image'))? 'error' : ''}}"
                                        placeholder="Upload Image" name="image">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-gradient-primary btn-icon-text">
                                            <i class="mdi mdi-upload btn-icon-prepend"></i> Upload </button>
                                    </span>
                                </div>
                                <img src="{{url('Uploads')}}/{{$finbyId->image}}" class="ImaPro" alt="">
                                @if($errors->has('image'))
                                <div class="alert-back mt-2" role="alert">
                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                        {{$errors->first('image')}}</p>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-gradient-primary text-white">$</span>
                                            </div>
                                            <input type="text"
                                                class="form-control {{($errors->has('image'))? 'price' : ''}}"
                                                aria-label="Amount (to the nearest dollar)" name="price"
                                                placeholder="Price Food" value="{{$finbyId->price}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                        @if($errors->has('price'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('price')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Status</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="status"
                                                            id="membershipRadios1" value="1" {{($finbyId->status == 1)? 'checked' : ''}}> Stocking <i
                                                            class="input-helper"></i><i
                                                            class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="status"
                                                            id="membershipRadios2" value="2" {{($finbyId->status == 2)? 'checked' : ''}}> Out of stock <i
                                                            class="input-helper"></i><i
                                                            class="input-helper"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop