@extends('layouts.admin')
    @section('title')
    جميع الملفات | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع الملفات
    @endsection

    @section('pageroutes')
    <li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.items' , $order)}}">{{$order->project}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.files' , $order)}}">الملفات</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.order-files')
                </div>
            </div>
        </div>

    @endsection

