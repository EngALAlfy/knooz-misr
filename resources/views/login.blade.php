<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminLTE/dist/css/adminlte.min.css')}}">

  <style>

      * {
          direction: rtl !important;
          text-align: right ;
      }
      .input-group>.input-group-append>.btn, .input-group>.input-group-append>.input-group-text, .input-group>.input-group-prepend:first-child>.btn:not(:first-child), .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child), .input-group>.input-group-prepend:not(:first-child)>.btn, .input-group>.input-group-prepend:not(:first-child)>.input-group-text {
    border-top-right-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
    }

    .input-group-append {
    margin-right: -1px;
}

.input-group:not(.has-validation)>.custom-file:not(:last-child) .custom-file-label::after, .input-group:not(.has-validation)>.custom-select:not(:last-child), .input-group:not(.has-validation)>.form-control:not(:last-child) {
    border-top-left-radius: 0 !important;
    border-bottom-left-radius: 0 !important;
}

[class*=icheck-]>label {
    padding-left: 0!important;
    padding-right: 29px!important;
}

[class*=icheck-]>input:first-child+input[type=hidden]+label::before, [class*=icheck-]>input:first-child+label::before {

    margin-right: -29px !important;
    margin-left: 0 !important;
}

[class*=icheck-]>input:first-child:checked+input[type=hidden]+label::after, [class*=icheck-]>input:first-child:checked+label::after {
    right: 0 !important;
    transform: translate(-7px,4px) rotate(45deg) !important;
}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">

@include('includes.status')

  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="{{ asset('assets/img/Logo.png') }}" alt="">
    </div>
    <div class="card-body">
      <p class="login-box-msg">تسجيل الدخول</p>

      <form action="{{route('login')}}" enctype="application/x-www-form-urlencoded" method="post">
        @csrf

        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">

            <input type="password"  name="password"
         class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                تذكرني
              </label>
            </div>
          </div>
          </div>


      <div class="social-auth-links text-center mt-2 mb-3">
        <button type="submit" class="btn btn-block btn-primary">
          <i class="fa fa-login mr-2"></i> دخول
        </button>
      </div>
      <!-- /.social-auth-links -->
    </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@include('includes.requiredscripts')

</body>
</html>
