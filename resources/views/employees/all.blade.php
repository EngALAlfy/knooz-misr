@extends('layouts.admin')
    @section('title')
    جميع الموظفين | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع الموظفين
    @endsection

    @section('pageroutes')
    <li class="breadcrumb-item"><a href="{{route('employees.all')}}">الموظفين</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.employees')
                </div>
            </div>
        </div>

    @endsection

