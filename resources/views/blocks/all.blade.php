@extends('layouts.admin')
    @section('title')
    جميع البلوكات | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع البلوكات
    @endsection

    @section('pageroutes')

    <li class="breadcrumb-item"><a href="{{route('blocks.all')}}">البلوكات</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.blocks')
                </div>
            </div>
        </div>

    @endsection

