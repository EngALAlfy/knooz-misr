@extends('layouts.admin')
@section('title')
مقاسات الترابيع  | مصنع رخام 7
@endsection

@section('pagetitle')
المقاسات
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('pieces.all')}}">الترابيع</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.pieces-sizes')
                </div>
            </div>
        </div>

    @endsection

