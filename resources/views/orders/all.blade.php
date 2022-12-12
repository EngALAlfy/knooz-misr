@extends('layouts.admin')
    @section('title')
    جميع الاوردرات | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع الاوردرات
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

