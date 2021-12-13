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

.error {
    border: 1px solid red !important;
}

.alert-back p {
    color: red;
}

.ImaPro {
    border-radius: 0 !important;
    width: 500px !important;
    height: auto !important;
}
</style>
@extends('back-end.master')
@section('Main_Admin')
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="{{route('banner.store')}}" class="forms-sample" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Title</label>
                                        <input type="text"
                                            class="form-control {{($errors->has('title'))? 'error' : ''}}" name="title"
                                            id="exampleInputUsername1" placeholder="Title Banner"
                                            value="{{old('title')}}">
                                        @if($errors->has('title'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('title')}}</p>
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
                                                            id="membershipRadios1" value="1" checked> Show <i
                                                            class="input-helper"></i><i
                                                            class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="status"
                                                            id="membershipRadios2" value="2"> Hide <i
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
                                @if($errors->has('image'))
                                <div class="alert-back mt-2" role="alert">
                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                        {{$errors->first('image')}}</p>
                                </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listData as $value)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$value->title}}</td>
                                    <td><img src="{{url('Uploads')}}/{{$value->image}}" class="ImaPro" alt="" style="max-width: 200px"></td>
                                    <td><label
                                            class="{{($value->status == 1)? 'badge-outline-warning' : 'badge-outline-danger'}} badge  badge-pill">{{($value->status == 1)? 'Show' : 'Hide'}}</label>
                                    </td>
                                    <td><a href="{{route('banner.edit', $value->id)}}"
                                            class="btn btn-gradient-dark btn-sm w-75"> <i class="far fa-edit"></i></a>
                                        <form action="{{route('banner.destroy', $value->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-dark btn-sm mt-1 w-75"> <i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination modal-4">
                            <li><a href="{{$listData->previousPageUrl()}}"
                                    class="{{($listData->currentPage() == 1)? 'prev d-none' : 'prev'}}">
                                    <i class="fa fa-chevron-left"></i>
                                    Previous
                                </a>
                            </li>
                            @for($i = 0; $i < $listData->lastPage(); $i++)
                                <li><a href="{{$listData->url($i + 1)}}"
                                        class="{{($listData->currentPage() == $i + 1)? 'active' : ''}}">{{$i + 1}}</a>
                                </li>
                                @endfor
                                <li><a href="{{$listData->nextPageUrl()}}"
                                        class="{{($listData->currentPage() == $listData->lastPage())? 'next d-none' : 'next'}}">
                                        Next
                                        <i class="fa fa-chevron-right"></i>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop