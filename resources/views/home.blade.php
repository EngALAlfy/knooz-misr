@extends('layouts.admin')
@section('title')
    الرئيسية | مصنع رخام 7
@endsection

@section('pagetitle')
    الاحصائيات
@endsection

@section('content')
    <style>
        .chart * {
            direction: ltr !important;

        }

        .inner p {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

    </style>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $blocks_year_count }}</h3>

                        <p>بلوكات تم استلامها خلال السنه</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('blocks.all') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $blocks_count }}</h3>

                        <p>بلوكات لم يتم نشرها</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('blocks.current') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $orders_count }}</h3>

                        <p>اوردرات</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('orders.current') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $strips_count }}</h3>

                        <p>طاولات حالية</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('strips.current') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $pieces_count }}</h3>

                        <p>ترابيع حالية</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('pieces.sizes') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $pieces_store_count }}</h3>

                        <p>ترابيع في المخزن</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('pieces-store.sizes') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $pieces_shipped_count }}</h3>

                        <p>ترابيع تم شحنها هذا الشهر </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('pieces-store.shipped') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $materials_count }}</h3>

                        <p>نوع خامة متاح</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('materials.all') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-md-2 col-4">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $policies_count }}</h3>

                        <p>بوليصة شحن هذا الشهر</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('orders.all') }}" class="small-box-footer text-center">المزيد <i
                            class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Line chart -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>

                            احصائبات الهدر خلال سنة {{ now()->format('Y') }}
                        </h3>

                        <div class="card-tools float-left">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 text-center">
                                <div class="chart" id="blocks-good-chart" style="height: 200px;"></div>
                                <h4 class=" text-center">البلوكات</h4>
                            </div>
                            <div class="col-3">
                                <div class="chart" id="strips-good-chart" style="height: 200px;"></div>
                                <h4 class=" text-center">الطاولات</h4>
                            </div>
                            <div class="col-3">
                                <div class="chart" id="pieces-good-chart" style="height: 200px;"></div>
                                <h4 class=" text-center">الترابيع</h4>
                            </div>
                            <div class="col-3">
                                <div class="chart" id="pieces-store-good-chart" style="height: 200px;"></div>
                                <h4 class=" text-center">المخزن</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->

                <!-- Line chart -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>

                            احصائبات الانتاج خلال سنة {{ now()->format('Y') }} (بناءا علي ما تم شحنه)
                        </h3>

                        <div class="card-tools float-left">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart" id="shipped-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->

                <!-- Bars chart -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>

                            احصائيات الخامات في المخزن
                        </h3>

                        <div class="card-tools float-left">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart" id="storage-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var shippedPieces = JSON.parse('{!! json_encode($shipped_year_pieces) !!}');
        var shippedData = [];
        //var minShippedPieces = 0;
        //var maxShippedPieces = 1000;
        //var piecesShippedTicks = [];

        //var shipped_counts = [];

        for (let key = 1; key <= 12; key++) {
            if (Object.hasOwnProperty.call(shippedPieces, key)) {

                const piecesList = shippedPieces[key];
                var count = 0;
                for (let index = 0; index < piecesList.length; index++) {
                    const element = piecesList[index];

                    count += element.count;

                }

                //shipped_counts.push(count);

                shippedData.push([key, count]);

            }else{
                shippedData.push([key, null]);
            }
        }


        /*
                // get max and min from _count
        maxShippedPieces = Math.max(...shipped_counts);
        minShippedPieces = Math.min(...shipped_counts);

        if(maxShippedPieces == minShippedPieces){
            maxShippedPieces = maxShippedPieces + maxShippedPieces/2;
            minShippedPieces = minShippedPieces - minShippedPieces/2;
        }

        // get shipped ticks
        var shippedPiecesTicksDivider = shipped_counts.reduce((a,b)=> a+b,0)/(shipped_counts.length < 5 ? 5 : shipped_counts.length );
        shippedPiecesTicksCount = Math.round((maxShippedPieces - minShippedPieces) / shippedPiecesTicksDivider);

        for (let index = 0; index <= shippedPiecesTicksCount + 1; index++) {
            piecesShippedTicks.push(minShippedPieces + (index * shippedPiecesTicksDivider));
        }

        */

        var shipped_data = {
            data: shippedData,
            color: '#00c0ef',
            label: "انتاج",
            highlightColor: 'red'
        }

        $.plot('#shipped-chart', [shipped_data], {
            axisLabels: {
                show: true,
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: '#f3f3f3',
                borderWidth: 1,
                tickColor: '#f3f3f3',
            },
            series: {
                shadowSize: 0,
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            lines: {
                fill: false,
                color: ['#3c8dbc', '#f56954']
            },
            yaxis: {
                axisLabel: "الانتاج",
                show: true,
                min: 0, // minShippedPieces,
                max: 120, //maxShippedPieces,
                tickDecimals: 0,
                //ticks: piecesShippedTicks,
            },
            xaxis: {
                axisLabel: "الشهر",
                show: true,
                min: 0,
                max: 12,
                gridLines: true,
                ticks: function(axis) {
                    var date = new Date();
                    var ticks = [];
                    for (let index = axis.min; index <= axis.max; index++) {
                        if (index == 0) {
                            ticks.push([index, ""]);
                            continue;
                        }

                        date.setMonth(index - 1);

                        ticks.push([index, date.toLocaleString('ar-EG', {
                            month: 'long',
                        })]);

                    }
                    return ticks;
                },
            }
        });


        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="shipped-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body')
        $('#shipped-chart').bind('plothover', function(event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2)

                var date = new Date();
                date.setMonth(x - 1);

                var month = date.toLocaleString('ar-EG', {
                    month: 'long',
                });

                $('#shipped-chart-tooltip').html(`${item.series.label} شهر ${month} = ${y}`)
                    .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200)
            } else {
                $('#shipped-chart-tooltip').hide()
            }

        })


        // storage bars chart

        var storage_materials = JSON.parse('{!! json_encode($storage_materials) !!}');
        var storage_materials_data = [];
        var materials_data = [];


        //storage_materials_data.push([0 , 0]);
        //materials_data.push([0 , ""]);

        var i = 1;
        for (const key in storage_materials) {
            if (Object.hasOwnProperty.call(storage_materials, key)) {
                materials_data.push([i, key]);
                const piecesList = storage_materials[key];
                var count = 0;
                for (let index = 0; index < piecesList.length; index++) {
                    const element = piecesList[index];

                    count += element.count;

                }

                storage_materials_data.push([i, count]);

                i++;
            }
        }

        var storage_data = {
            data: storage_materials_data,
            color: '#00c0ef',
            label: "عدد الترابيع خامة",
            bars: {
                show: true,
                width: 0.5
            },
            highlightColor: 'red'
        }


        $.plot('#storage-chart', [storage_data], {
            axisLabels: {
                show: true,
            },
            grid: {
                hoverable: true,
                clickable: true,
                borderColor: '#f3f3f3',
                borderWidth: 1,
                tickColor: '#f3f3f3',
            },
            series: {
                shadowSize: 0,
                bars: {
                    show: true,
                    barWidth: 0.2,
                    align: 'center',
                },
            },
            yaxis: {
                axisLabel: "عدد الترابيع",
                show: true,
                min: 0,
                max: 120,
            },
            xaxis: {
                axisLabel: "الخامة",
                show: true,
                min: 0,
                max: materials_data.length,
                ticks: materials_data,
            },
        });


        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="storage-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body')
        $('#storage-chart').bind('plothover', function(event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(0),
                    y = item.datapoint[1].toFixed(0)

                $('#storage-chart-tooltip').html(`${item.series.label}  ${materials_data[x-1][1]} = ${y}`)
                    .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200)
            } else {
                $('#storage-chart-tooltip').hide()
            }

        })


        /*
         * DONUT CHART
         * -----------
         */

        var goodBlocksData = [{
                label: 'جيدة',
                data: {{ ($notgood_blocks_count + $good_blocks_count) == 0 ? 0 : ($good_blocks_count * 100) / ($notgood_blocks_count + $good_blocks_count) }},
                color: 'green'
            },

            {
                label: 'غير جيدة',
                data: {{ ($notgood_blocks_count + $good_blocks_count) == 0 ? 0 : ($notgood_blocks_count * 100) / ($notgood_blocks_count + $good_blocks_count) }},
                color: 'orange'
            }
        ]
        $.plot('#blocks-good-chart', goodBlocksData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.2,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                }
            },
            legend: {
                show: false
            }
        });

        var goodStripsData = [{
                label: 'جيدة',
                data: {{ ($notgood_strips_count + $good_strips_count + $broken_strips_count) == 0 ? 0 :($good_strips_count * 100) / ($notgood_strips_count + $good_strips_count + $broken_strips_count) }},
                color: 'green'
            },
            {
                label: 'هدر',
                data: {{ ($notgood_strips_count + $good_strips_count + $broken_strips_count) == 0 ? 0 :($broken_strips_count * 100) / ($notgood_strips_count + $good_strips_count + $broken_strips_count) }},
                color: 'red'
            },

            {
                label: 'بها دمار',
                data: {{ ($notgood_strips_count + $good_strips_count + $broken_strips_count) == 0 ? 0 :($notgood_strips_count * 100) / ($notgood_strips_count + $good_strips_count + $broken_strips_count) }},
                color: 'orange'
            }
        ]
        $.plot('#strips-good-chart', goodStripsData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.2,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                }
            },
            legend: {
                show: false
            }
        });


        var goodPiecesData = [{
                label: 'جيدة',
                data: {{ ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) ==0?0:($good_pieces_count * 100) / ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) }},
                color: 'green'
            },
            {
                label: 'هدر',
                data: {{ ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) ==0?0:($broken_pieces_count * 100) / ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) }},
                color: 'red'
            },

            {
                label: 'بها دمار',
                data: {{ ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) ==0?0:($notgood_pieces_count * 100) / ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) }},
                color: 'orange'
            }
        ]
        $.plot('#pieces-good-chart', goodPiecesData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.2,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                }
            },
            legend: {
                show: false
            }
        });
        /*
         * END DONUT CHART
         */

        var goodPiecesStoreData = [{
                label: 'جيدة',
                data: {{ ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) ==0?0:($good_pieces_store_count * 100) / ($notgood_pieces_store_count + $good_pieces_store_count + $broken_pieces_store_count) }},
                color: 'green'
            },
            {
                label: 'هدر',
                data: {{ ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) ==0?0:($broken_pieces_store_count * 100) / ($notgood_pieces_store_count + $good_pieces_store_count + $broken_pieces_store_count) }},
                color: 'red'
            },

            {
                label: 'بها دمار',
                data: {{ ($notgood_pieces_count + $good_pieces_count + $broken_pieces_count) ==0?0:($notgood_pieces_store_count * 100) / ($notgood_pieces_store_count + $good_pieces_store_count + $broken_pieces_store_count) }},
                color: 'orange'
            }
        ]
        $.plot('#pieces-store-good-chart', goodPiecesStoreData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.2,
                    label: {
                        show: true,
                        radius: 2 / 4,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }

                }
            },
            legend: {
                show: false
            }
        });
        /*
         * END DONUT CHART
         */



        /*
         * Custom Label formatter
         * ----------------------
         */
        function labelFormatter(label, series) {
            return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
                label +
                '<br>' +
                Math.round(series.percent) + '%</div>'
        }
    </script>
@endsection
