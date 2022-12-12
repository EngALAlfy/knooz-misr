@extends('layouts.admin')
@section('title')
الاوردرات الموجودة | مصنع رخام 7
@endsection

@section('pagetitle')
الاوردرات الموجودة
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.orders')
                </div>
            </div>
        </div>

    @endsection

