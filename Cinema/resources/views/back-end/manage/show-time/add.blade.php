@extends('back-end.master')
@section('Main_Admin')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('show-time.store')}}" class="forms-sample" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Date</label>
                                        <input type="date" class="form-control {{($errors->has('date'))? 'error' : ''}}"
                                            id="title" onkeyup="ChangeToSlug()" placeholder="Film Name" name="date">
                                        @if($errors->has('date'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('date')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Film</label>
                                        <select class="form-control" id="exampleFormControlSelect2" name="film_id">
                                            @foreach($listFilm as $value)
                                            <option value="{{$value->id}}">{{$value->name}} - {{$value->time}} Minutes
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cinema</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        @foreach($listCinema as $value)
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="cinema_id"
                                                        value="{{$value->id}}"> {{$value->name}}
                                                    <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @if($errors->has('cinema_id'))
                                    <div class="alert-back mt-2" role="alert">
                                        <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                            {{$errors->first('cinema_id')}}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Movie Room</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        @foreach($listRoom as $value)
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="room_id"
                                                        value="{{$value->id}}"> {{$value->name}}
                                                    <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @if($errors->has('room_id'))
                                    <div class="alert-back mt-2" role="alert">
                                        <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                            {{$errors->first('room_id')}}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Time</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        @foreach($listTime as $value)
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="time_id"
                                                        value="{{$value->id}}"> {{$value->time}}
                                                    {{($value->time >= '13:00')? 'CH' : 'SA'}}
                                                    <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @if($errors->has('time_id'))
                                    <div class="alert-back mt-2" role="alert">
                                        <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                            {{$errors->first('time_id')}}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop