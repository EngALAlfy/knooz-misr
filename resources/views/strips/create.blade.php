@extends('layouts.admin')
@section('title')
اضافة طاولات | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة طاولات
@endsection

@section('pageroutes')

<li class="breadcrumb-item"><a href="{{route('strips.all')}}">الطاولات</a></li>
@endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">اضافة طاولات جديدة</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="application/x-www-form-urlencoded" action="{{ route('strips.store') }}">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="block_id">البلوك</label>
                      <select class="form-control select2" name="block_id" id="block_id">
                        @foreach ($blocks as $item)
                        <option value="{{$item->id}}" >{{$item->number}}->{{$item->material->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="machine_id">الماكينة</label>
                        <select class="select2" style="width: 100%" name="machine_id" id="machine_id">
                            @foreach ($machines as $item)
                            <option value="{{$item->id}}" >{{$item->name}}->{{$item->number}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cut_date">تاريخ النشر</label>
                        <input type="date" class="form-control" id="cut_date" name="cut_date" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="length">الطول </label>
                        <input type="number" class="form-control" id="length" name="length" placeholder="">
                      </div>


                    <div class="form-group">
                        <label for="width">العرض </label>
                        <input type="number" class="form-control" id="width" name="width" placeholder="">
                      </div>



                    <div class="form-group">
                        <label for="thickness">السمك</label>
                        <input type="number" class="form-control" id="thickness" name="thickness" placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="count">العدد</label>
                        <input type="number" class="form-control" id="count" name="count" placeholder="">
                      </div>

                    <div class="form-group">
                        <label for="status">الحاله</label>
                        <select class="form-control" name="status" id="status">
                            <option value="good" >جيد</option>
                            <option value="notgood" >به دمار</option>
                            <option value="broken" >هدر</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="position">الموقف</label>
                        <select class="form-control" name="position" id="position">
                            <option value="current" >موجود</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="finish_type">نوع التشطيب</label>
                        <select class="form-control" name="finish_type" id="finish_type">
                            <option value="type1" >غشيم</option>
                            <option value="type2" >هوند</option>
                            <option value="type3" >براشد</option>
                            <option value="type4" >لامع مباشر</option>
                            <option value="type5" >لامع رماله</option>
                            <option value="type6" >لامع</option>
                            <option value="type7" >لامع معالج</option>
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

