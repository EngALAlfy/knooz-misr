@extends('layouts.admin')
@section('title')
الطاولات تم نشرها | مصنع رخام 7
@endsection

@section('pagetitle')
الطاولات تم نشرها
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('strips.all')}}">الطاولات</a></li>
@endsection
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.strips')
                </div>
            </div>
        </div>

    @endsection

