<!DOCTYPE html >
<html lang="ar" dir="rtl">
<head>
  @include('includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

@include('includes.navbar')

@include('includes.mainsidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('includes.pageheader')


    <!-- Main content -->
    <div class="content">

        @include('includes.status')

        @yield('content')

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('includes.mainfooter')
</div>
<!-- ./wrapper -->

@include('includes.requiredscripts')
</body>
</html>
