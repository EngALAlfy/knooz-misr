@extends('layouts.admin')
    @section('title')
    جميع المستخدمين | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع المستخدمين
    @endsection

    @section('pageroutes')

    <li class="breadcrumb-item"><a href="{{route('users.all')}}">المستخدمين</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.users')
                </div>
            </div>
        </div>

    @endsection

