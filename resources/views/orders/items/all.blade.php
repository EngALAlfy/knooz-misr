@extends('layouts.admin')
    @section('title')
    جميع العناصر | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع العناصر
    @endsection

    @section('pageroutes')
    <li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.items' , $order)}}">{{$order->project}}</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.order-items')
                </div>
            </div>
        </div>

    @endsection

