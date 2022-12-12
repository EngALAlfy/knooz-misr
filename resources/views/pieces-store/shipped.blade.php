@extends('layouts.admin')
@section('title')
الترابيع تم شحنها من المخزن | مصنع رخام 7
@endsection

@section('pagetitle')
الترابيع تم شحنها من المخزن
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('pieces-store.all')}}">المخزن</a></li>
@endsection
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.pieces-store')
                </div>
            </div>
        </div>

    @endsection

