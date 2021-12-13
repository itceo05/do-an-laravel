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
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('movie-chair.store') }}" class="forms-sample" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Name</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name"
                                                id="title" placeholder="Enter Name Chair" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <div class="alert-back mt-2" role="alert">
                                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                        {{ $errors->first('name') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('price') ? 'error' : '' }}"
                                                    name="price" id="slug" placeholder="Price" value="{{ old('price') }}">
                                                @if ($errors->has('price'))
                                                    <div class="alert-back mt-2" role="alert">
                                                        <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                            {{ $errors->first('price') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-2">
                                </div>
                                <div class="col-sm-12 col-md-10">
                                    <form action="{{ route('search-chair') }}" method="GET">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text bg-transparent border-right-0">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </span>
                                            <input class="form-control py-2 border-left-0 border" type="search"
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($Flag == 1)
                                        @foreach ($listData as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>$ {{ $value->price }}</td>
                                                <td><a href="{{ route('movie-chair.edit', $value->id) }}"
                                                        class="btn btn-gradient-dark btn-sm w-75"> <i
                                                            class="far fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <ul class="pagination modal-4">
                                <li><a href="{{ $listData->previousPageUrl() }}"
                                        class="{{ $listData->currentPage() == 1 ? 'prev d-none' : 'prev' }}">
                                        <i class="fa fa-chevron-left"></i>
                                        Previous
                                    </a>
                                </li>
                                @for ($i = 0; $i < $listData->lastPage(); $i++)
                                    <li><a href="{{ $listData->url($i + 1) }}"
                                            class="{{ $listData->currentPage() == $i + 1 ? 'active' : '' }}">{{ $i + 1 }}</a>
                                    </li>
                                @endfor
                                <li><a href="{{ $listData->nextPageUrl() }}"
                                        class="{{ $listData->currentPage() == $listData->lastPage() ? 'next d-none' : 'next' }}">
                                        Next
                                        <i class="fa fa-chevron-right"></i>
                            </ul>
                        @else
                            @if ($Count != 0)
                                @foreach ($listData as $value)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>$ {{ $value->price }}</td>
                                        <td><a href="{{ route('movie-chair.edit', $value->id) }}"
                                                class="btn btn-gradient-dark btn-sm w-75"> <i
                                                    class="far fa-edit"></i></a>
                                            <form action="{{ route('movie-chair.destroy', $value->id) }}" method="POST">
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
                                    <li><a href="{{ $listData->previousPageUrl() }}&keywords={{ $keywords }}"
                                            class="{{ $listData->currentPage() == 1 ? 'prev d-none' : 'prev' }}">
                                            <i class="fa fa-chevron-left"></i>
                                            Previous
                                        </a>
                                    </li>
                                    @for ($i = 0; $i < $listData->lastPage(); $i++)
                                        <li><a href="{{ $listData->url($i + 1) }}&keywords={{ $keywords }}"
                                                class="{{ $listData->currentPage() == $i + 1 ? 'active' : '' }}">{{ $i + 1 }}</a>
                                        </li>
                                    @endfor
                                    <li><a href="{{ $listData->nextPageUrl() }}&keywords={{ $keywords }}"
                                            class="{{ $listData->currentPage() == $listData->lastPage() ? 'next d-none' : 'next' }}">
                                            Next
                                            <i class="fa fa-chevron-right"></i>
                                </ul>
                            @else
                                <tr class="odd">
                                    <td valign="top" colspan="8" class="dataTables_empty text-center ">No results found for
                                        keyword <strong> " {{ $keywords }} "</strong><br><a
                                            href="{{ route('movie-chair.index') }}"
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
