@extends('back-end.master')
@section('Main_Admin')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('time.update', $finbyId->id)}}" class="forms-sample" method="POST">
                            @METHOD('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Time</label>
                                <input type="time" class="form-control {{($errors->has('time'))? 'error' : ''}}"
                                    id="exampleInputUsername1" placeholder="Time" name="time"
                                    value="{{$finbyId->time}}">
                                @if($errors->has('time'))
                                <div class="alert-back mt-2" role="alert">
                                    <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                        {{$errors->first('time')}}</p>
                                </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$finbyId->time}} {{($finbyId->time >= '13:00')? 'CH' : 'SA'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop