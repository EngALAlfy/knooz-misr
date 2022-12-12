@extends('layouts.admin')
@section('title')
الطاولات الموجودة | مصنع رخام 7
@endsection

@section('pagetitle')
الطاولات الموجودة
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

