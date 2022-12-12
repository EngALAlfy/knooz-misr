@extends('layouts.admin')
    @section('title')
    بوليصة شحن رقم : {{ $shipPolicy->number }} | مصنع رخام 7
    @endsection

    @section('pagetitle')
         بوليصة شحن رقم : {{ $shipPolicy->number }}
    @endsection

    @section('pageroutes')
    <li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.items' , $order)}}">{{$order->project}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.ship-policies' , $order)}}">بلايص الشحن</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.ship-policies.records' , ['order' => $order , 'shipPolicy' => $shipPolicy])}}">{{ $shipPolicy->number }}</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.order-ship-policy-records')
                </div>
            </div>
        </div>

    @endsection

