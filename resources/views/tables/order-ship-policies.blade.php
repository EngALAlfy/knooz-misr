<div class="card">
    <div class="card-header row">
        <div class="card-title col-md-6"><h4>رقم الاوردر : {{$order->number}}</h4></div>
        <div class="card-title col-md-6"><h4>المشروع : {{$order->project}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ الاوردر : {{$order->order_date}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ البدء : {{$order->start_date}}</h4></div>
    </div>
    <div class="card-body text-right">
        <div id="toolbar">
            <div class="px-1"><a href="{{route('orders.ship-policies.create' , $order)}}" class="btn btn-success"><i class="fa fa-plus"></i> اضافة </a></div>
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
           data-show-columns-toggle-all="true" data-data="{{$ships}}" >
        <thead>
        <tr>
            <th data-field="id"  data-visible="false" data-sortable="true">ID</th>
            <th data-field="number"  data-sortable="true">رقم البوليصة</th>
            <th data-field="car_number"  data-sortable="true">رقم السيارة</th>
            <th data-field="driver_name"  data-sortable="true">اسم السائق</th>
            <th data-field="ship_date"  data-sortable="true">تاريخ الشحن</th>
            <th data-field="created_at"  data-sortable="true">انشأة في تاريخ</th>
            <th data-field="user.name"  data-sortable="true">بواسطة</th>
            <th data-field="id" data-formatter="actionsFormat"  data-sortable="true">الاجراءات</th>
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

    function actionsFormat(value , row){
        var html = '<div>';
            html += `<a href="/knooz-misr/factory-7/orders/${row.order_id}/ship-policies/${value}/records" class="btn btn-primary ml-2"><i class="fa fa-eye"></i> عرض العناصر </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${row.order_id}/ship-policies/${value}/records/create" class="btn btn-success ml-2"><i class="fa fa-plus"></i> اضافة عنصر للبوليصة </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${row.order_id}/ship-policies/${value}/delete" class="btn btn-danger ml-2"><i class="fa fa-trash"></i> حذف </a>`;
            //html += `<a href="/knooz-misr/factory-7/orders/${row.order_id}/ship-policies/${row.ship_policy_id}/records/${value}/delete" class="btn btn-danger"><i class="fa fa-trash"></i> حذف </a>`;
            html += '</div>'
        return html;
    }


</script>
