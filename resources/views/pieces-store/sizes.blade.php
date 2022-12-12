@extends('layouts.admin')
@section('title')
مقاسات الترابيع في المخزن  | مصنع رخام 7
@endsection

@section('pagetitle')
المقاسات في المخزن
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('pieces-store.all')}}">المخزن</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @include('tables.pieces-sizes-store')
                </div>
            </div>
        </div>

    @endsection

