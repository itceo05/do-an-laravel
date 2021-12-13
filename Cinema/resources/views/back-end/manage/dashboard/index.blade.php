@extends('back-end.master')
@section('Main_Admin')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-cube text-danger icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Total Revenue</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">$
                                        {{number_format($TotalRevenue)}}</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> {{$Analysis}}%
                            {{($TotalRevenue > $RevenueLastMonth)? 'higher growth' : 'lower growth'}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-receipt text-warning icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Orders</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">{{number_format($listDataOfMonth)}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Orders Of The Month
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-poll-box text-success icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Products Sold</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">{{number_format($Sales)}}</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0">
                            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Month Sales
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-cart-outline icon-lg text-success d-flex align-items-center"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Today Sales</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">$
                                        {{number_format($TodaySales)}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{url('assets-admin')}}/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image">
                        <h4 class="font-weight-normal mb-3">Last Month's Sales <i
                                class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">$ {{number_format($RevenueLastMonth)}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{url('assets-admin')}}/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image">
                        <h4 class="font-weight-normal mb-3">Last Month's Orders <i
                                class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{number_format($CountLastMonth)}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{url('assets-admin')}}/images/dashboard/circle.svg" class="card-img-absolute"
                            alt="circle-image">
                        <h4 class="font-weight-normal mb-3">Visitors Online <i
                                class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{number_format(3500)}}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin">
                <div class="card card-statistics">
                    <div class="row">
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i class="mdi mdi-account-multiple-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">New Users</p>
                                        <div class="fluid-container">
                                            <h3 class="mb-0 font-weight-medium">{{number_format($NewUser)}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i
                                        class="mdi mdi-checkbox-marked-circle-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">New Feedbacks</p>
                                        <div class="fluid-container">
                                            <h3 class="mb-0 font-weight-medium">{{number_format($NewFeedback)}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6 border-right">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i class="mdi mdi-trophy-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">Employees</p>
                                        <div class="fluid-container">
                                            <h3 class="mb-0 font-weight-medium">{{number_format(130)}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                    <i class="mdi mdi-target text-primary mr-0 mr-sm-4 icon-lg"></i>
                                    <div class="wrapper text-center text-sm-left">
                                        <p class="card-text mb-0">Total Sales</p>
                                        <div class="fluid-container">
                                            <h3 class="mb-0 font-weight-medium">$ {{number_format($TotalRevenue)}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center"
                                    style="font-family: cursive; font-weight: bold; font-size: 30px">TOP 5 Users</h4>
                                <div class="table-responsive mt-3">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Bookings</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($topUser as $value)
                                            <tr class="text-center">
                                                <td>{{$loop->index + 1}}</td>
                                                <td><img src="{{url('Uploads')}}/{{($user->where('id', $value->id)->first()->image == '')? 'user.jpg' : $user->where('id', $value->id)->first()->image}}" alt=""></td>
                                                <td>{{$user->where('id', $value->id)->first()->name}}</td>
                                                <td>{{$user->where('id', $value->id)->first()->email}}</td>
                                                <td><pre>Not Update </pre></td>
                                                <td>{{$value->booking}}</td>
                                                <td>
                                                    <a href="{{route('profile', $value->id)}}"
                                                        class="btn btn-gradient-dark btn-sm w-75"> <i
                                                            class="far fa-eye"></i></a>
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
        </div>
    </div>
</div>
@stop