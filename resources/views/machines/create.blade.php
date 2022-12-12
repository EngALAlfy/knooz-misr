@extends('layouts.admin')
@section('title')
ماكينة جديدة | مصنع رخام 7
@endsection

@section('pagetitle')
ماكينة جديدة
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('blocks.all')}}">الماكينات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة ماكينه جديدة</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('machines.store') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">الاسم</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="job">الوظيفة</label>
                        <input type="text" class="form-control" id="job" name="job" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="number">رقم الماكينة</label>
                        <input type="number" class="form-control" id="number" name="number" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="desc">وصف الماكينه</label>
                        <input type="text" class="form-control" id="desc" name="desc" placeholder="">
                      </div>


                      <div class="form-group">
                        <label for="input_type">نوع المدخلات</label>
                        <select class="form-control" name="input_type" id="input_type">
                          <option value="block">بلوك</option>
                          <option value="strip">طاولة</option>
                          <option value="piece">تربيعة</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="output_type">نوع المخرجات</label>
                        <select class="form-control" name="output_type" id="output_type">
                            <option value="strip">طاولة</option>
                            <option value="piece">تربيعة</option>
                        </select>
                      </div>


                    <div class="form-group">
                        <label for="producty">الانتاجية</label>
                        <input type="text" class="form-control" id="producty" name="producty" placeholder="">
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

