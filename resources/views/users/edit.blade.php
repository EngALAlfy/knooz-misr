@extends('layouts.admin')
@section('title')
تعديل مستخدم | مصنع رخام 7
@endsection

@section('pagetitle')
    تعديل مستخدم
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
                  <h3 class="card-title">تعديل المستخدم : {{$user->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('users.update' , $user) }}">
                    @csrf
                  <div class="card-body">

                    <div class="form-group">
                        <label for="name">الاسم </label>
                        <input type="text" required class="form-control" value="{{$user->name}}" id="name" name="name" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="email">البريد \ دخول </label>
                        <input disabled readonly type="text" required class="form-control" value="{{$user->email}}" id="email" name="email" placeholder="">
                      </div>



                    <div class="form-group">
                        <label for="password">الباسوورد</label>
                        <input type="password" required class="form-control" id="password" name="password" placeholder="">
                      </div>

                    @can('create' , \App\Models\User::class)
                    <div class="form-group">
                        <label for="role">الصلاحية</label>
                        <select required class="form-control" name="role" id="role">
                            <option value="user" {{ $user->role == "user" ? "selected" : "" }} >عادي</option>
                            <option value="shipper" {{ $user->role == "shipper" ? "selected" : "" }} >تحميلات</option>
                            <option value="admin" {{ $user->role == "admin" ? "selected" : "" }} >مدير</option>
                            <option value="full_admin" {{ $user->role == "full_admin" ? "selected" : "" }} >مدير كامل</option>
                        </select>
                    </div>
                    @endcan

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

