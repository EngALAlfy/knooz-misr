@extends('layouts.admin')
@section('title')
اضافة خط عمل للموظفين | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة خط عمل للموظفين
@endsection

@section('pageroutes')
<li class="breadcrumb-item"><a href="{{route('employees.all')}}">الموظفين</a></li>
<li class="breadcrumb-item"><a href="{{route('employees.lines.all')}}">الخطوط</a></li>

@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة خط جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('employees.lines.store') }}">
                    @csrf
                  <div class="card-body">

                      <div class="form-group">
                          <label for="name">الاسم </label>
                          <input type="text" required class="form-control" id="name" name="name" placeholder="">
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

