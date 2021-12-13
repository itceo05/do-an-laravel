<style>
    .content-wrapper{
        padding: 0px !important;
    }
    .auth .login-half-bg {
        width: 700px;
        height: 700px;
    }
    .auth .login-half-bg img{
        width: 100%;
    }
    .input-group{
        border: 1px solid #c9c8c8;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Cinema Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('assets-admin')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{url('assets-admin')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('assets-admin')}}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('assets-admin')}}/images/favicon.ico" />
</head>

<body cz-shortcut-listen="true">
@include('sweetalert::alert')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left">
                            <div class="brand-logo">
                                <img src="{{url('assets-admin')}}/images/logo.svg" alt="logo">
                            </div>
                            <h4>Password Retrieval!</h4>
                            <h6 class="font-weight-light">Enter your new password! </h6>
                            <form action="{{route('postReset')}}" class="pt-3" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Username</label>
                                  <pre><i class="mdi mdi-account-outline text-primary"></i> {{$admin->name}}</pre>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email</label>
                                  <pre><i class="mdi mdi-email-outline text-primary"></i> {{$admin->email}}</pre>
                                  <input type="hidden" name="email" value="{{$admin->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0 {{($errors->has('password'))? 'error' : ''}}"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('password')}}</p>
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0 {{($errors->has('password_confirm'))? 'error' : ''}}"
                                            id="exampleInputPassword" placeholder="Confirm Password" name="password_confirm">
                                    </div>
                                    @if($errors->has('password_confirm'))
                                        <div class="alert-back mt-2" role="alert">
                                            <p><i class="mdi mdi-alert-circle"> </i><strong>Remind!</strong>
                                                {{$errors->first('password_confirm')}}</p>
                                        </div>
                                        @endif
                                </div>
                                <div class="my-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                        >Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <div class="auth">
                            <div class="login-half-bg">
                            <img src="{{url('assets-admin')}}/images/faces/login-bg.jpg" alt="">
                            </div>
                        </div>
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright © 2018
                            All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{url('assets-admin')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('assets-admin')}}/js/off-canvas.js"></script>
    <script src="{{url('assets-admin')}}/js/hoverable-collapse.js"></script>
    <script src="{{url('assets-admin')}}/js/misc.js"></script>
    <script src="{{url('assets-admin')}}/js/settings.js"></script>
    <script src="{{url('assets-admin')}}/js/todolist.js"></script>
    <script src="{{url('assets-admin')}}/js/jquery.cookie.js"></script>
    <!-- endinject -->

</body>

</html>