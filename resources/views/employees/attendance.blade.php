@extends('layouts.admin')
    @section('title')
    حضور الموظفين | مصنع رخام 7
    @endsection

    @section('pagetitle')
    حضور الموظفين
    @endsection

    @section('pageroutes')
    <li class="breadcrumb-item"><a href="{{route('employees.all')}}">الموظفين</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.attendance')
                </div>
            </div>
        </div>

    @endsection

