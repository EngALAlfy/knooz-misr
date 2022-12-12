<div class="card">
    <div class="card-header row">
        <div class="card-title col-md-6"><h4>رقم الاوردر : {{$order->number}}</h4></div>
        <div class="card-title col-md-6"><h4>المشروع : {{$order->project}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ الاوردر : {{$order->order_date}}</h4></div>
        <div class="card-title col-md-6"><h4>تاريخ البدء : {{$order->start_date}}</h4></div>
    </div>
    <div class="card-body text-right">

        <div id="toolbar">
            <div class="px-1"><a href="{{route('orders.files.create' , $order)}}" class="btn btn-success"><i class="fa fa-plus"></i> اضافة </a></div>
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
           data-show-columns-toggle-all="true" data-data="{{$files}}" >
        <thead>
        <tr>
            <th data-field="id"  data-visible="false" data-sortable="true">ID</th>
            <th data-field="name"  data-sortable="true">الاسم</th>
            <th data-field="file" data-sortable="true">الملف</th>

            <th data-field="created_at" data-filter-control="datepicker" data-filter-datepicker-options='{"format":"yyyy-mm-dd","autoclose":true,"todayHighlight":true,"clearBtn":true,"zIndexOffset":1035,"language":"ar","weekStart":6}' >تاريخ</th>
            <th data-field="user.name" data-filter-control="select" data-sortable="true">بواسطة</th>

            <th data-field="file" data-formatter="actionsFormat" data-sortable="true">اجراءات</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>

<script>

    function actionsFormat(value , row){
        var html = '<div style="display:flex;">';

        html += `<div class="px-1"><a href="/storage/files/${row.order.number}/${value}" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i> عرض </a></div>`;
        html += `<div class="px-1"><a href="/storage/files/${row.order.number}/${value}" download class="btn btn-success"><i class="fa fa-download"></i> تحميل </a></div>`;
        html += `<div class="px-1"><a href="/knooz-misr/factory-7/orders/${row.order.id}/files/${row.id}/delete" class="btn btn-danger"><i class="fa fa-trash"></i> حذف </a></div>`;

        html += '</div>';
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

