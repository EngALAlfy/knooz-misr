<div class="card">
    <div class="card-header row">
        <div class="card-title col-md-6"><h4>رقم الاوردر : {{$order->number}}</h4></div>
        <div class="card-title col-md-6"><h4>المشروع : {{$order->project}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ الاوردر : {{$order->order_date}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ البدء : {{$order->start_date}}</h4></div>
    </div>
    <div class="card-body text-right">
        <div id="toolbar">
            <div class="px-1"><a href="{{route('orders.items.create' , $order)}}" class="btn btn-success"><i class="fa fa-plus"></i> اضافة </a></div>
        </div>
        <table id="table"
        data-toolbar="#toolbar"
           data-toggle="table"
           data-show-columns="true"
           data-search="true"
           data-show-print="true"
           dir="rtl"
           data-dir="rtl"
           class="table table-striped text-right"
           data-buttons-align="left"
           data-search-align="left"
           data-show-fullscreen="true"
           data-toolbar-align="right"
           data-show-filter-control-switch="true"
           data-filter-control="true"
           data-filter-control-visible="false"
           data-show-columns-toggle-all="true" data-data="{{$items}}" >
        <thead>
        <tr>
            <th data-field="id"  data-visible="false" data-sortable="true">ID</th>
            <th data-field="material.name"  data-sortable="true">الخامة</th>
            <th data-field="finish_type" data-formatter="finishTypeFormat" data-sortable="true">نوع التشطيب</th>
            <th data-field="length"  data-sortable="true">الطول</th>
            <th data-field="width"  data-sortable="true">العرض</th>
            <th data-field="thickness"  data-sortable="true">السمك</th>
            <th data-field="count"  data-sortable="true">العدد</th>
            <th data-field="volume" data-formatter="volumeFormat"  data-sortable="true">الحجم</th>
            <th data-field="done_count"  data-sortable="true">ما تم انتاجه</th>
            <th data-field="done_volume" data-formatter="doneVolumeFormat"  data-sortable="true">حجم الانتاج</th>
            <th data-field="done_percent" data-formatter="donePercentFormat"  data-sortable="true">نسبة الانتاج</th>
            <th data-field="shipped_count"   data-sortable="true">ما تم شحنه</th>
            <th data-field="shipped_volume" data-formatter="shippedVolumeFormat"  data-sortable="true">حجم الشحن</th>
            <th data-field="shipped_percent" data-formatter="shippedPercentFormat"  data-sortable="true">نسبة الشحن</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>

@section('js')
<script>
    $('#table').bootstrapTable({
        showExport:true,
        exportTypes: ['png','pdf','xlsx'],
        exportOptions:{
            pdfmake:{
                enabled:true,
                docDefinition:{
                    pageOrientation:'landscape',
                    defaultStyle:{
                        font:'Roboto',
                    },
                },
            },
            mso:{
                rtl:true,
            },
        },
    });
</script>
@endsection

<script>

    function orderItemsActionsFormat(value){
        var html = '<div>';
            html += `<a href="/orders/${value}/items" class="btn btn-primary ml-2"><i class="fa fa-eye"></i> عرض العناصر </a>`;
            html += `<a href="/orders/${value}/items/create" class="btn btn-success"><i class="fa fa-plus"></i> اضافة عنصر للاوردر </a>`;
            html += '</div>'
        return html;
    }

    function finishTypeFormat(value , row){
       return value=="type1" ? "غشيم" : value=="type2" ?"هوند" : value=="type3" ?"براشد": value=="type4" ?"لامع": value=="type5" ?"لامع معالج" : "N/A";
    }

    function volumeFormat(value , row){
        return row.length * row.width * row.thickness * row.count / 10000;
    }

    function doneVolumeFormat(value , row){
        return row.length * row.width * row.thickness * row.done_count / 10000;
    }

    function donePercentFormat(value , row){
        return ((row.length * row.width * row.thickness * row.done_count / 10000) / (row.length * row.width * row.thickness * row.count / 10000)) * 100 + "%";
    }

    function shippedVolumeFormat(value , row){
        return row.length * row.width * row.thickness * row.shipped_count / 10000;
    }

    function shippedPercentFormat(value , row){
        return ((row.length * row.width * row.thickness * row.shipped_count / 10000) / (row.length * row.width * row.thickness * row.count / 10000)) * 100 + "%";
    }

</script>
