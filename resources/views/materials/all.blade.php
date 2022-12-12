@extends('layouts.admin')
@section('title')
الخامات | مصنع رخام 7
@endsection

@section('pagetitle')
   الخامات
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('blocks.all')}}">الخامات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.materials')
                </div>
            </div>
        </div>

    @endsection

