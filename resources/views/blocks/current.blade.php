@extends('layouts.admin')
@section('title')
البلوكات الموجودة | مصنع رخام 7
@endsection

@section('pagetitle')
    البلوكات الموجودة
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

