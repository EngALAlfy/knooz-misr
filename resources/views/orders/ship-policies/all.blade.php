
@extends('layouts.admin')
@section('title')
جميع بلايص الشحن | مصنع رخام 7
@endsection

@section('pagetitle')
    جميع بلايص الشحن
@endsection

@section('pageroutes')
<li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
<li class="breadcrumb-item"><a href="{{route('orders.items' , $order)}}">{{$order->project}}</a></li>
<li class="breadcrumb-item"><a href="{{route('orders.ship-policies' , $order)}}">بلايص الشحن</a></li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    @include('tables.order-ship-policies')
            </div>
        </div>
    </div>

@endsection

