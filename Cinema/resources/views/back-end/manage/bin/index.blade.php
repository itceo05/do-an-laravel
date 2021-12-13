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
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Date Deleted</th>
                                    <th>Restore</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($RecycleBlog as $value)
                                <tr class="text-center">
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=blog" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleCate as $value)
                                <tr class="text-center">
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=cate" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleRoom as $value)
                                <tr class="text-center">
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=room" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a><br>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleChair as $value)
                                <tr class="text-center">
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=chair" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleFilm as $value)
                                <tr class="text-center">
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=film" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleTime as $value)
                                <tr class="text-center">
                                    <td>{{$value->time}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=time" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleFood as $value)
                                <tr class="text-center">
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=food" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleCom as $value)
                                <tr class="text-center">
                                    <td class="tb-content">{{$value->content}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=com" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleFeed as $value)
                                <tr class="text-center">
                                    <td class="tb-content">{{$value->content}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=feed" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($RecycleView as $value)
                                <tr class="text-center">
                                    <td class="tb-content">{{$value->content}}</td>
                                    <td>{{$value->deleted_at}}</td>
                                    <td><a href="{{route('bin-restore', $value->id)}}&bin=view" class="btn btn-gradient-dark btn-sm w-75"> <i class="fas fa-history"></i></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop