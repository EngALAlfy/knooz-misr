<div class="card">
    <div class="card-header row">
        <div class="card-title col-md-6"><h4>رقم الاوردر : {{$order->number}}</h4></div>
        <div class="card-title col-md-6"><h4>المشروع : {{$order->project}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ الاوردر : {{$order->order_date}}</h4></div>
        <div class="card-title col-md-6"><h4>العميل : {{$order->client}}</h4></div>
        <div class="card-title col-md-6"><h4>رقم البوليصة : {{$shipPolicy->number}}</h4></div>
        <div class="card-title col-md-6"><h4>اسم السائق : {{$shipPolicy->driver_name}}</h4></div>
        <div class="card-title col-md-6"><h4>رقم السيارة : {{$shipPolicy->car_number}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ الشحن : {{$shipPolicy->ship_date}}</h4></div>
    </div>
    <div class="card-body text-right">
        <div id="toolbar">
            <div class="px-1 float-right"><a href="{{route('orders.ship-policies.records.create' , ['order' => $order , 'shipPolicy' => $shipPolicy])}}" class="btn btn-success"><i class="fa fa-plus"></i> اضافة </a></div>
            <div class="px-1 float-left"><a target="_blank" href="{{route('orders.ship-policies.records.print' , ['order' => $order , 'shipPolicy' => $shipPolicy])}}" class="btn btn-info"><i class="fa fa-print"></i> طباعه </a></div>
        </div>
        <table id="table"
        data-toolbar="#toolbar"
           data-toggle="table"
           data-show-columns="true"
           data-search="true"
           data-show-print="false"
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
           data-show-columns-toggle-all="true" data-data="{{$records}}" >
        <thead>
        <tr>
            <th data-field="id"  data-visible="false" data-sortable="true">ID</th>
            <th data-field="material.name"  data-filter-control="select"  data-sortable="true">الخامة</th>
            <th data-field="length" data-filter-control="input"  data-sortable="true">الطول</th>
            <th data-field="width" data-filter-control="input"  data-sortable="true">العرض</th>
            <th data-field="thickness" data-filter-control="input"  data-sortable="true">السمك</th>
            <th data-field="count" data-filter-control="input" >عدد الترابيع</th>
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
            @can('delete' , \App\Models\ShipPolicyRecord::class)
                html += `<a href="/knooz-misr/factory-7/orders/${row.order_id}/ship-policies/${row.ship_policy_id}/records/${value}/delete" class="btn btn-danger"><i class="fa fa-trash"></i> ارجاع للمخزن </a>`;
            @endcan
            html += '</div>'
        return html;
    }


</script>
