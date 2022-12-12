@extends('layouts.admin')
    @section('title')
    اضافة عنصر | مصنع رخام 7
    @endsection

    @section('pagetitle')
         بوليصة شحن رقم : {{ $shipPolicy->number }}
    @endsection

    @section('pageroutes')
    <li class="breadcrumb-item"><a href="{{route('orders.all')}}">الاوردرات</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.items' , $order)}}">{{$order->project}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.ship-policies' , $order)}}">بلايص الشحن</a></li>
    <li class="breadcrumb-item"><a href="{{route('orders.ship-policies' , $order)}}">{{ $shipPolicy->number }}</a></li>
    @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اضافة عناصر الي بوليصة شحن</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('orders.ship-policies.records.store', ['order' => $order , 'shipPolicy' => $shipPolicy]) }}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="material_id">الخامة</label>
                                <select class="form-control select2" name="material_id" id="material_id">
                                    @foreach ($materials as $item)
                                        <option value="{{$item->id}}" {{ $item->id == old('material_id') ? "selected" : "" }} >{{$item->name}}->{{$item->color}}</option>
                                    @endforeach
                                </select>
                              </div>

                            <div class="form-group">
                                <label for="length">الطول </label>
                                <input type="number" value="{{ old('length') }}" class="form-control" id="length" name="length" placeholder="">
                              </div>


                            <div class="form-group">
                                <label for="width">العرض </label>
                                <input type="number" value="{{ old('width') }}" class="form-control" id="width" name="width" placeholder="">
                              </div>



                            <div class="form-group">
                                <label for="thickness">السمك</label>
                                <input type="number" value="{{ old('thickness') }}" class="form-control" id="thickness" name="thickness" placeholder="">
                              </div>

                              <div class="form-group">
                                <label for="count">العدد</label>
                                <input type="number" value="{{ old('count') }}" class="form-control" id="count" name="count" placeholder="">
                              </div>

                              <div class="form-group">
                                <label for="finish_type">نوع التشطيب</label>
                                <select class="form-control" name="finish_type" id="finish_type">
                                    <option value="type1" {{ "type1" == old('finish_type') ? "selected" : "" }} >غشيم</option>
                                    <option value="type2" {{ "type2" == old('finish_type') ? "selected" : "" }} >هوند</option>
                                    <option value="type3" {{ "type3" == old('finish_type') ? "selected" : "" }} >براشد</option>
                                    <option value="type4" {{ "type4" == old('finish_type') ? "selected" : "" }} >لامع مباشر</option>
                                    <option value="type5" {{ "type5" == old('finish_type') ? "selected" : "" }} >لامع رماله</option>
                                    <option value="type6" {{ "type6" == old('finish_type') ? "selected" : "" }} >لامع</option>
                                    <option value="type7" {{ "type7" == old('finish_type') ? "selected" : "" }} >لامع معالج</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="last" id="last">
                                    <label for="last">
                                      اخر عنصر
                                    </label>
                                  </div>
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
