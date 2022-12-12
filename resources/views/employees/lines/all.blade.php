@extends('layouts.admin')
    @section('title')
    جميع خطوط عمل للموظفين | مصنع رخام 7
    @endsection

    @section('pagetitle')
        جميع خطوط عمل للموظفين
    @endsection

    @section('pageroutes')
    <li class="breadcrumb-item"><a href="{{route('employees.all')}}">الموظفين</a></li>
<li class="breadcrumb-item"><a href="{{route('employees.lines.all')}}">الخطوط</a></li>

    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.lines')
                </div>
            </div>
        </div>

    @endsection

