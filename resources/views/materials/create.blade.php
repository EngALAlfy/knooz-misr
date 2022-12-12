@extends('layouts.admin')
@section('title')
اضافة خامة | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة خامة
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('blocks.all')}}">الخامات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة خامة جديدة</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('materials.store') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">الاسم</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="color">اللون</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="">
                      </div>


                      <div class="form-group">
                        <label for="speed">سرعه النشر</label>
                        <input type="number" class="form-control" id="speed" name="speed" placeholder="">
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

