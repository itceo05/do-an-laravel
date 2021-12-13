@extends('back-end.master')
@section('Main_Admin')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('cinema.update', $finbyId->id)}}" class="forms-sample" method="POST">
                            @METHOD('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{$finbyId->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Name</label>
                                        <input type="text" class="form-control {{($errors->has('name'))? 'error' : ''}}"
                                            name="name" id="exampleInputUsername1" placeholder="Cinema Name" value="{{$finbyId->name}}"> 
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
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantity Room</label>
                                            <input type="number"
                                                class="form-control {{($errors->has('address'))? 'error' : ''}}"
                                                name="quantity_Room" id="exampleInputEmail1" placeholder="Quantity Room" value="{{$finbyId->quantity_Room}}">
                                            @if($errors->has('quantity_Room'))
                                            <div class="alert-back mt-2" role="alert">
                                                <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                    {{$errors->first('quantity_Room')}}</p>
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
                                        name="address" id="exampleInputEmail1" placeholder="Cinema Address" value="{{$finbyId->address}}">
                                    @if($errors->has('address'))
                                    <div class="alert-back mt-2" role="alert">
                                        <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                            {{$errors->first('address')}}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="membershipRadios1" value="1" {{($finbyId->status == 1)? 'checked' : ''}}> In progress <i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="membershipRadios2" value="2" {{($finbyId->status == 2)? 'checked' : ''}}> Pending <i
                                                class="input-helper"></i></label>
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
