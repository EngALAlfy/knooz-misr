@extends('layouts.admin')

@section('content')
    <style>
        .chart * {
            direction: ltr !important;

        }

    </style>
        <div class="row justify-content-center">
            <div class="col-11">
                <!-- Line chart -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>

                            احصائبات الانتاج خلال سنة {{ now()->format('Y') }}
                        </h3>

                        <div class="card-tools float-left">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart" id="line-chart" style="height: 300px;"></div>
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
                        <div class="chart" id="bar-chart" style="height: 300px;"></div>
                    </div>
                    <!-- /.card-body-->
                </div>
                <!-- /.card -->
            </div>
        </div>

@endsection

@section('js')
    <script>
        var randomData = [];


        for (let index = 1; index <= 12; index++) {
            var value = Math.floor(Math.random() * 100) + 10;
            randomData.push([index, value]);
        }

        var line_data2 = {
            data: randomData,
            color: '#00c0ef',
            label: "انتاج",
            highlightColor: 'red'
        }


        $.plot('#line-chart', [line_data2], {
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
                min: 0,
                max: 120,
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
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body')
        $('#line-chart').bind('plothover', function(event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2)

                var date = new Date();
                date.setMonth(x - 1);

                var month = date.toLocaleString('ar-EG', {
                    month: 'long',
                });

                $('#line-chart-tooltip').html(`${item.series.label} شهر ${month} = ${y}`)
                    .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200)
            } else {
                $('#line-chart-tooltip').hide()
            }

        })


        // bars chart

        var line_data3 = {
            data: randomData,
            color: '#00c0ef',
            label: "عدد الترابيع خامة",
            bars:{show:true , width:0.5},
            highlightColor: 'red'
        }


        $.plot('#bar-chart', [line_data3], {
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
          show: true, barWidth: 0.2, align: 'center',
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
                max: 12,
                ticks: [[0 , ""] , [1,"تاسوس"],[2,"صني منيا"],[3,"تريستا"],[4,"جرانيت"],[5,"صناعي"],[6,"امبرادور"],[7,"احمر قصير"],[8,"جلالة كريمي"],[9,"جلالة ايزيس"],[10,"جلالة ضوفيا"],[11,"اتون"],[12,"نيوجولد"]],
            }
        });


        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="bar-chart-tooltip"></div>').css({
            position: 'absolute',
            display: 'none',
            opacity: 0.8
        }).appendTo('body')
        $('#bar-chart').bind('plothover', function(event, pos, item) {

            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2)

                $('#bar-chart-tooltip').html(`${item.series.label}  ${x} = ${y}`)
                    .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200)
            } else {
                $('#bar-chart-tooltip').hide()
            }

        })
    </script>
@endsection
