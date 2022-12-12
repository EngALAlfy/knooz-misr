<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>بوليصة رقم {{$shipPolicy->number}}</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />




<style type="text/css" media="print">
 @page{
     size: a4;

}

body {
    width: 960px !important;
    min-width: 960px !important;
}

    .container {
        width: 940px !important;
        min-width: 940px !important;
    }


</style>

<style type="text/css" media="all">
    .table td {
        font-weight: 700;
        text-align: center;
        vertical-align: middle !important;
        border: 0.5pt solid black;
        white-space: normal;
        padding: 4px;
    }

    .table thead {
        background: #DDEBF7 !important;
        -webkit-print-color-adjust: exact !important;
    }



</style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 container">

                <div class="row justify-content-between">
                    <div class="col-5 p-0" style="font-size: 17px ;line-height: 17px;text-align: right">
                        <br>الهيئة الهندسية للقوات المسلحة
                        <br>مدينة كنـــوز للرخــــام والجرانيــــت
                        <br>ادارة الــلـــوجــيــســتــك الــداخــــلي
                        <br>{{ now()->format('Y-m-d') }}
                    </div>


                    <div class="col-3">
                        <img src="{{ asset('assets/img/Logo.png') }}">
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="col-6  text-center p-1"
                        style="background-color: #9BC2E6;border: 1px solid black; vertical-align: middle">
                        بوليصة شحن
                    </div>
                </div>

                <div class="row justify-content-between mt-2">
                    <div class="col-4  text-right p-1"
                        style="background-color: #DDEBF7;border: 1px solid black; vertical-align: middle">
                        مصنع / رخام 7
                    </div>

                    <div class="col-4  text-right p-1"
                        style="background-color: #DDEBF7;border: 1px solid black; vertical-align: middle">
                        رقم البوليصة / {{$shipPolicy->number}}
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-4 text-right p-1"
                        style="background-color: #DDEBF7;border: 1px solid black; vertical-align: middle">
                        عميل / {{$order->client}}
                    </div>

                    <div class="col-4  text-right p-1"
                        style="background-color: #DDEBF7;border: 1px solid black; vertical-align: middle">
                        التاريخ / {{$shipPolicy->ship_date}}
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-4  text-right p-1"
                        style="background-color: #DDEBF7;border: 1px solid black; vertical-align: middle">
                        المشروع / {{$order->project}}
                    </div>

                    <div class="col-4  text-right p-1"
                        style="background-color: #DDEBF7;border: 1px solid black; vertical-align: middle">
                        رقم العقد / {{$order->number}}
                    </div>
                </div>



                <div class="row">
                    <div class="col-12 m-0 p-0">
                        <table border="0" class="table mt-2">
                            <thead >
                                <tr>
                                    <td rowspan="2">م</td>
                                    <td class="thead" rowspan="2">رقم الاوردر</td>
                                    <td rowspan="2">العدد</td>
                                    <td class="thead" colspan="3">الابعاد</td>
                                    <td rowspan="2">الكود</td>
                                    <td class="thead" rowspan="2">عدد البالتات</td>
                                    <td rowspan="2">اجمالي م.ط.</td>
                                    <td rowspan="2">اجمالي م2</td>
                                    <td rowspan="2">الخامة</td>
                                    <td rowspan="2">التشطيب</td>
                                    <td rowspan="2">ملاحظات</td>
                                </tr>

                                <tr>

                                    <td>طول</td>
                                    <td>عرض</td>
                                    <td>ارتفاع</td>

                                </tr>
                            </thead>

                            <tbody>


                                @foreach ($records as $key => $record)

                                @php
                                    // get record area in meterl
                                    $ml = ($record->length/100) * $record->count;

                                    // get record area in meter 2
                                    $area = (($record->length * $record->width)/10000) * $record->count;
                                @endphp


                                <tr>
                                    <td>{{$key + 1}}</td>
                                    @if($key == 0)
                                    <td rowspan="{{count($records)}}">{{ $order->number }}</td>
                                    @endif
                                    <td>{{$record->count}}</td>
                                    <td>{{$record->length}}</td>
                                    <td>{{$record->width}}</td>
                                    <td>{{$record->thickness}}</td>
                                    <td>الكود</td>
                                    <td>عدد البالتات</td>
                                    <td>{{$ml}}</td>
                                    <td>{{$area}}</td>
                                    <td>{{$record->material->name}}</td>
                                    <td>{{$record->finish_type}}</td>
                                    <td>ملاحظات</td>
                                </tr>
                                @endforeach

                            </tbody>



                        </table>
                    </div>
                </div>


                <div class="row justify-content-between mt-4 p-3"
                    style="border: 1px solid black; vertical-align: middle">
                    <div class="col-4 text-right ">
                        اسم السائق / {{$shipPolicy->driver_name}}
                    </div>
                    <div class="col-4 text-right">
                        رقم السيارة / {{$shipPolicy->car_number}}
                    </div>
                </div>

                <div class="row justify-content-between py-1" style="border: 1px solid black;">
                    <div class="col-4 text-right " style=" vertical-align: top;padding-bottom: 40px;">
                        مسئول التحميل / {{$shipPolicy->user->name}}
                    </div>
                    <div class="col-4 text-right" style=" vertical-align: bottom;padding-top: 40px;">
                        يعتمد /
                    </div>
                </div>

                <div class="row justify-content-between pt-2 pb-1"
                    style="border: 1px solid black; vertical-align: middle">
                    <div class="col-12 text-center pb-1" style="font-weight: 600;text-decoration-line: underline">
                        استلام العميل
                    </div>
                    <div class="col-4 text-right">
                        استلمت انا /
                    </div>
                    <div class="col-4 text-right">
                        مندوب شركة /
                    </div>
                    <div class="col-4 text-right">
                        رقم قومي /
                    </div>
                </div>

                <div class="row justify-content-between pt-2 pb-1 mb-5"
                    style="border: 1px solid black; vertical-align: middle">
                    <div class="col-12 text-right pb-1" style="font-weight: 600">
                        الأصناف الموضحة عاليه من مندوب شركه النقل طبقا للعدد والكمية المذكورة وهي بحالة جيدة واعتبر
                        مسئولاً عنها مسئولية كاملة من وقت استلامي لها.
                    </div>
                    <div class="col-12 text-right pb-5">
                        ملاحظات العميل /
                    </div>
                    <div class="col-4 text-right"></div>
                    <div class="col-4 text-right">
                        التوقيع /
                    </div>
                </div>

            </div>
        </div>
    </div>

<script>//print()</script>
</body>

</html>
