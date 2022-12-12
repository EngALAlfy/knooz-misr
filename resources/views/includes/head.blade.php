<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminLTE/dist/css/adminlte.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/select2/css/select2.min.css')}}">

  <!-- Bootstrap 4 RTL
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
  -->
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{ asset('assets/adminLTE/dist/css/custom.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link href="{{  asset('assets/css/bootstrap-table.min.css') }}" rel="stylesheet"/>
    <link href="{{  asset('assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{  asset('assets/css/bootstrap-table-sticky-header.css') }}" rel="stylesheet"/>

  <!-- jQuery -->
<script src="{{ asset('assets/adminLTE/plugins/jquery/jquery.min.js')}}"></script>


<style>
    /* for horizontal scroll */
   /*
   .fixed-table-body{
        max-height: 500px;
        overflow-y: overlay!important;
    }
    */
</style>
