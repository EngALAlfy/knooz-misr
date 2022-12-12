@extends('layouts.admin')
@section('title')
    اضافة بوليصة شحن | مصنع رخام 7
@endsection

@section('pagetitle')
    اضافة بوليصة شحن
@endsection

@section('pageroutes')
    <li class="breadcrumb-item"><a href="{{ route('orders.all') }}">الاوردرات</a></li>
    <li class="breadcrumb-item"><a href="{{ route('orders.items', $order) }}">{{ $order->project }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('orders.ship-policies', $order) }}">بلايص الشحن</a></li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اضافة بوليصة شحن</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ route('orders.ship-policies.store', $order) }}">
                        @csrf
                        <div class="card-body">





                            <div class="form-group">
                                <label for="number">رقم البوليصة</label>
                                <input type="number" value="{{ old('number')}}" class="form-control" id="number" name="number" required placeholder="">
                            </div>


                            <div class="form-group">
                                <label for="car_number">رقم السيارة</label>
                                <input type="text" value="{{ old('car_number')}}" class="form-control" id="car_number" name="car_number" required placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="driver_name">اسم السائق</label>
                                <input type="text" value="{{ old('driver_name') }}" class="form-control" id="driver_name" name="driver_name" required placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="ship_date">تاريخ الشحن</label>
                                <input type="date" value="{{ old('ship_date') ?? now()->format("Y-d-m") }}" class="form-control" id="ship_date" name="ship_date" required placeholder="">
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
