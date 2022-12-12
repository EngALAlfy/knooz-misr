@extends('layouts.admin')
@section('title')
اضافة مستخدم | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة مستخدم
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('users.all')}}">المستخدمين</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة مستخدم جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('users.store') }}">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                        <label for="name">الاسم </label>
                        <input type="text" required class="form-control" id="name" name="name" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="email">البريد \ دخول </label>
                        <input type="text" required class="form-control" id="email" name="email" placeholder="">
                      </div>



                    <div class="form-group">
                        <label for="password">الباسوورد</label>
                        <input type="password" required class="form-control" id="password" name="password" placeholder="">
                      </div>

                    <div class="form-group">
                        <label for="role">الصلاحية</label>
                        <select required class="form-control" name="role" id="role">
                            <option value="user" >عادي</option>
                            <option value="shipper" >تحميلات</option>
                            <option value="admin" >مدير</option>
                            <option value="full_admin" >مدير كامل</option>
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

