@extends('layouts.admin')
@section('title')
الماكينات | مصنع رخام 7
@endsection

@section('pagetitle')
الماكينات
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('blocks.all')}}">الماكينات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.machines')
                </div>
            </div>
        </div>

    @endsection

