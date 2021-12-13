<style>
.error {
    border: 1px solid red !important;
}

.alert-back p {
    color: red;
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
                        <form action="{{route('contact-info.update', $finbyId->id)}}" class="forms-sample"
                            method="POST">
                            @METHOD('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Email</label>
                                        <input type="email"
                                            class="form-control {{($errors->has('email'))? 'error' : ''}}" name="email"
                                            id="exampleInputUsername1" placeholder="Email" value="{{$finbyId->email}}">
                                        @if($errors->has('email'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('email')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text"
                                                class="form-control {{($errors->has('phone'))? 'error' : ''}}"
                                                name="phone" id="exampleInputEmail1" placeholder="Phone number"
                                                value="{{$finbyId->phone}}">
                                            @if($errors->has('phone'))
                                            <div class="alert-back mt-2" role="alert">
                                                <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                    {{$errors->first('phone')}}</p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control {{($errors->has('address'))? 'error' : ''}}"
                                        name="address" id="exampleInputEmail1" placeholder="Address"
                                        value="{{$finbyId->address}}">
                                    @if($errors->has('address'))
                                    <div class="alert-back mt-2" role="alert">
                                        <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                            {{$errors->first('address')}}</p>
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
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$finbyId->email}}</td>
                                    <td>{{$finbyId->phone}}</td>
                                    <td>{{$finbyId->address}}</td>
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