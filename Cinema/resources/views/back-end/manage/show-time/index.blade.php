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
    width: 100px !important;
    height: auto !important;
    display: block;
    margin-left: auto;
    margin-right: auto;
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
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('show-time.create')}}" class="btn btn-gradient-primary btn-icon-text">
                                    <i class="mdi mdi-clock-fast btn-icon-prepend"></i> AddData </a>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2">
                                    </div>
                                    <div class="col-sm-12 col-md-10">
                                        <form action="{{route('search-show-time')}}" method="GET">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <div class="input-group-text bg-transparent border-right-0">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </span>
                                                <input class="form-control py-2 border-left-0 border" type="date"
                                                    id="example-search-input" placeholder="Search" name="keywords">
                                                <span class="input-group-append">
                                                    <button class="btn btn-outline-secondary border-left-0 border"
                                                        type="submit">
                                                        Search
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Film</th>
                                    <th>Time</th>
                                    <th>Cinema</th>
                                    <th>Movie Room</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($Flag == 1)
                                @foreach($listData as $value)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td class="">{{$value->date}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->time}} {{($value->time >= '13:00')? 'CH' : 'SA'}}</td>
                                    <td>{{ $value->cinema->name }}</td>
                                    <td>
                                        {{$value->room}}
                                    </td>
                                    <td><a href="{{route('show-time.edit', $value->id)}}"
                                            class="btn btn-gradient-dark btn-sm w-75"> <i class="far fa-edit"></i></a>
                                        <form action="{{route('show-time.destroy', $value->id)}}" method="POST">
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
                        @else
                        @if($Count != 0)
                        @foreach($listData as $value)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td class="">{{$value->date}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->time}} {{($value->time >= '13:00')? 'CH' : 'SA'}}</td>
                            <td>{{ $value->cinema->name }}</td>
                            <td>
                                {{$value->room}}
                            </td>
                            <td><a href="{{route('show-time.edit', $value->id)}}" class="btn btn-gradient-dark btn-sm w-75">
                                    <i class="far fa-edit"></i></a>
                                <form action="{{route('show-time.destroy', $value->id)}}" method="POST">
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
                            <li><a href="{{$listData->previousPageUrl()}}&keywords={{$keywords}}"
                                    class="{{($listData->currentPage() == 1)? 'prev d-none' : 'prev'}}">
                                    <i class="fa fa-chevron-left"></i>
                                    Previous
                                </a>
                            </li>
                            @for($i = 0; $i < $listData->lastPage(); $i++)
                                <li><a href="{{$listData->url($i + 1)}}&keywords={{$keywords}}"
                                        class="{{($listData->currentPage() == $i + 1)? 'active' : ''}}">{{$i + 1}}</a>
                                </li>
                                @endfor
                                <li><a href="{{$listData->nextPageUrl()}}&keywords={{$keywords}}"
                                        class="{{($listData->currentPage() == $listData->lastPage())? 'next d-none' : 'next'}}">
                                        Next
                                        <i class="fa fa-chevron-right"></i>
                        </ul>
                        @else
                        <tr class="odd">
                            <td valign="top" colspan="8" class="dataTables_empty text-center ">No results found for
                                keyword <strong> " {{$keywords}} "</strong><br><a href="{{route('show-time.index')}}"
                                    class="btn btn-outline-primary mt-3">Back!</a></td>
                        </tr>
                        </tbody>
                        </table>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop