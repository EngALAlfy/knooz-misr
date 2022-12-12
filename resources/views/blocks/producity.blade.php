@extends('layouts.admin')
    @section('title')
    انتاجية البلوكات | مصنع رخام 7
    @endsection

    @section('pagetitle')
    انتاجية البلوكات
    @endsection

    @section('pageroutes')

    <li class="breadcrumb-item"><a href="{{route('blocks.all')}}">البلوكات</a></li>
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="length">طول النشر (سم)</label>
                                <input type="number" class="form-control" id="length" name="length" placeholder="">
                              </div>


                              <div class="form-group">
                                <label for="thickness">سمك الطاولة (سم)</label>
                                <input type="number" class="form-control" id="thickness" name="thickness" placeholder="">
                              </div>



                              <button class="btn btn-success" id="submit" >احسب</button>

                              <div class="card-footer mt-5" id="result">
                              </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>


            $(function (){

                $('#submit').on('click' , function (){

                    calucalate();

                });


            });


            function calucalate() {
                var length = $('#length').val();
                var thickness = $('#thickness').val();


                var saws_count = Math.floor(length / thickness) + 1;

                var saws_length = saws_count * 0.6;

                var pure_length = length - saws_length;

                var strips_count = Math.floor(pure_length / thickness);



                var html = '<div class="row" style="max-width:500px;">';

html += '<div class="col-6"> عدد المناشير : '+saws_count+' منشار</div>';
html += '<div class="col-6"> طول المناشير : '+saws_length+' سم</div>';
html += '<div class="col-6"> طول اتجاه النشر الصافي  : '+pure_length+' سم</div>';
html += '<div class="col-6"> نسبة هدر المناشير : '+(((length-pure_length)/pure_length)*100).toFixed(1)+'%</div>';
html += '<div class="col-6"> عدد الطاولات القياسي : '+strips_count+' طاولة</div>';

html += '</div>';


               $('#result').html(html);

            }

        </script>

    @endsection

