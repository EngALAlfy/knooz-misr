@extends('layouts.admin')
@section('title')
اضافة بلوك | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة بلوك
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('blocks.all')}}">البلوكات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة بلوك جديد</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('blocks.store') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="number">رقم البلوك</label>
                      <input type="text" class="form-control" id="number" name="number" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="material_id">الخامة</label>
                        <select class="form-control select2" name="material_id" id="material_id">
                            @foreach ($materials as $item)
                            <option value="{{$item->id}}" >{{$item->name}}->{{$item->color}}</option>
                            @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                        <label for="recive_date">تاريخ الاستلام</label>
                        <input type="date" class="form-control" id="recive_date" name="recive_date" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="length_before">الطول قبل الخصم</label>
                        <input type="number" class="form-control" id="length_before" name="length_before" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="width_before">العرض قبل الخصم</label>
                        <input type="number" class="form-control" id="width_before" name="width_before" placeholder="">
                      </div>



                    <div class="form-group">
                        <label for="height_before">الارتفاع قبل الخصم</label>
                        <input type="number" class="form-control" id="height_before" name="height_before" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="length_after">الطول بعد الخصم</label>
                        <input type="number" class="form-control" id="length_after" name="length_after" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="width_after">العرض بعد الخصم</label>
                        <input type="number" class="form-control" id="width_after" name="width_after" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="height_after">الارتفاع بعد الخصم</label>
                        <input type="number" class="form-control" id="height_after" name="height_after" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="status">الحاله</label>
                        <select class="form-control" name="status" id="status">
                            <option value="good" >جيد</option>
                            <option value="notgood" >به دمار</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="position">الموقف</label>
                        <select class="form-control" name="position" id="position">
                            <option value="current" >موجود</option>
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

