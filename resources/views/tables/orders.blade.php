<div class="card">
    <div class="card-body">
        <table id="table"
           data-toggle="table"
           data-show-columns="true"
           data-search="true"
           data-show-print="true"
           dir="rtl"
           class="table table-striped text-right"
           data-buttons-align="left"
           data-search-align="left"
           data-show-fullscreen="true"
           data-toolbar-align="right"
           data-show-filter-control-switch="true"
           data-filter-control="true"
           data-filter-control-visible="false"
           data-show-columns-toggle-all="true" data-data="{{$orders}}" >
        <thead>
        <tr>
            <th data-field="id" data-visible="false" data-sortable="true">ID</th>
            <th data-field="number"  data-sortable="true">رقم الاوردر</th>
            <th data-field="project"  data-sortable="true">المشروع</th>
            <th data-field="client"  data-sortable="true">العميل</th>
            <th data-field="order_date"  data-sortable="true">تاريخ الاوردر</th>
            <th data-field="strat_date"  data-sortable="true">تاريخ البدء</th>
            <th data-field="id"  data-formatter="ordersActionsFormat">الاجراءات</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>

<script>
    function ordersActionsFormat(value){
        var html = '<div>';
            html += `<a href="/knooz-misr/factory-7/orders/${value}/files" class="btn btn-info ml-2 mb-2"><i class="fa fa-eye"></i> عرض الملفات </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/ship-policies" class="btn btn-warning ml-2 mb-2"><i class="fa fa-eye"></i> عرض بلايص الشحن </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/items" class="btn btn-primary ml-2 mb-2"><i class="fa fa-eye"></i> عرض العناصر </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/items/create" class="btn btn-success ml-2 mb-2"><i class="fa fa-plus"></i> اضافة عنصر للاوردر </a>`;
            html += `<br>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/start" class="btn btn-outline-success ml-2"><i class="fa fa-play"></i> بدء </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/stop" class="btn btn-outline-danger ml-2"><i class="fa fa-stop"></i> ايقاف </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/finish" class="btn btn-outline-info ml-2"><i class="fa fa-check"></i> انتهاء </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/edit" class="btn btn-warning ml-2"><i class="fa fa-edit"></i> تعديل </a>`;
            html += `<a href="/knooz-misr/factory-7/orders/${value}/delete" class="btn btn-danger"><i class="fa fa-trash"></i> حذف </a>`;
            html += '</div>'
        return html;
    }

</script>


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
