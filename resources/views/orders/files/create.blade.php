@extends('layouts.admin')
@section('title')
اضافة ملف للاوردر | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة ملف للاوردر
@endsection

@section('pageroutes')
<li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
<li class="breadcrumb-item"><a href="{{route('orders.items' , $order)}}">{{$order->project}}</a></li>
<li class="breadcrumb-item"><a href="{{route('orders.files' , $order)}}">الملفات</a></li>

@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة ملف جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data" action="{{ route('orders.files.store' , $order) }}">
                    @csrf
                  <div class="card-body">





                      <div class="form-group">
                          <label for="name">اسم الملف </label>
                          <input type="text" class="form-control" id="name" name="name" required placeholder="">
                    </div>


                    <div class="form-group">
                          <label for="file"> الملف </label>
                          <input type="file" class="form-control" id="file" name="file" required>
                    </div>







                  </div>

                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
                </div>
            </div>
        </div>
    @endsection

