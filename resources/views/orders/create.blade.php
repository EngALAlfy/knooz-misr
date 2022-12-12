@extends('layouts.admin')
@section('title')
اضافة اوردر | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة اوردر
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة اوردر جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('orders.store') }}">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                        <label for="number">رقم الاوردر </label>
                        <input type="number" class="form-control" id="number" name="number" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="order_date">تاريخ الاوردر</label>
                        <input type="date" class="form-control" id="order_date" name="order_date" placeholder="">
                      </div>

                    <div class="form-group">
                        <label for="start_date">تاريخ البدء</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="project">المشروع </label>
                        <input type="text" class="form-control" id="project" name="project" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="client">العميل </label>
                        <input type="text" class="form-control" id="client" name="client" placeholder="">
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

