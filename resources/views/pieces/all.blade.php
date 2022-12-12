@extends('layouts.admin')
    @section('title')
    جميع الترابيع | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع الترابيع
    @endsection

    @section('pageroutes')

    <li class="breadcrumb-item"><a href="{{route('pieces.all')}}">الترابيع</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.pieces')
                </div>
            </div>
        </div>

    @endsection

