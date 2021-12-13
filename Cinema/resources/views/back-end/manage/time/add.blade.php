@extends('back-end.master')
@section('Main_Admin')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('time.store')}}" class="forms-sample" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Time</label>
                                        <input type="time" class="form-control {{($errors->has('time'))? 'error' : ''}}"
                                            id="exampleInputUsername1" placeholder="Time" name="time">
                                        @if($errors->has('time'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('time')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Film</label>
                                        <select class="form-control {{($errors->has('film_id'))? 'error' : ''}}"
                                            id="exampleFormControlSelect2" name="film_id">
                                            @foreach($listFilm as $value)
                                            <option value="{{$value->id}}">{{$value->name}} ( {{$value->time}} Minutes )
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                                    <input type="checkbox" class="form-check-input" name="room_id[]"
                                                        value="{{$value->id}}"> {{$value->name}} (
                                                    {{$value->quantity_Chair}} Seats )
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
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid clearfix">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                    bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                        href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                        templates </a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
</div>
@stop