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
@include('sweetalert::alert')
<div class="main-panel">
    <div class="content-wrapper">
        @if(!$check)
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('contact-info.store')}}" class="forms-sample" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Email</label>
                                        <input type="email"
                                            class="form-control {{($errors->has('email'))? 'error' : ''}}" name="email"
                                            id="exampleInputUsername1" placeholder="Email" value="{{old('email')}}">
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
                                                value="{{old('phone')}}">
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
                                        value="{{old('address')}}">
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
        @endif
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Position</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listData as $value)
                                <tr class="text-center">
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$user->where('id', $value->user_id)->first()->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{($user->where('id', $value->user_id)->first()->role == 0)? 'Admin' : 'Customer'}}
                                    </td>
                                    <td>{{$value->address}}</td>
                                    <td>
                                        @if($user->where('id', $value->user_id)->first()->role == 0)
                                        <a href="{{route('contact-info.edit', $value->id)}}"
                                            class="btn btn-gradient-dark btn-sm w-75"> <i class="far fa-edit"></i></a>
                                        @endif
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