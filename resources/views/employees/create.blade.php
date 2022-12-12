@extends('layouts.admin')
@section('title')
اضافة موظف | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة موظف
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('employees.all')}}">الموظفين</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة موظف جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('employees.store') }}">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                        <label for="name">الاسم </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="code">الكود</label>
                        <input type="number" class="form-control" id="code" name="code" placeholder="">
                      </div>

                    <div class="form-group">
                        <label for="job">الوظيفة</label>
                        <input type="text" class="form-control" id="job" name="job" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="phone">الهاتف </label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                      </div>


                      <div class="form-group">
                        <label for="employee_line_id">الخط</label>
                        <select class="form-control select2" name="employee_line_id" id="employee_line_id">
                            @foreach ($lines as $item)
                            <option value="{{$item->id}}" >{{$item->name}}->{{$item->employees_count}}</option>
                            @endforeach
                        </select>
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

