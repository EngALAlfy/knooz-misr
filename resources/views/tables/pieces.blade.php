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
           data-show-columns-toggle-all="true" data-data="{{$pieces}}" >
        <thead>
        <tr>
            <th data-field="id" data-visible="false" data-sortable="true">ID</th>
            <th data-field="block.number" data-filter-control="input"  data-sortable="true">رقم البلوك</th>
            <th data-field="block.material.name"  data-filter-control="select"  data-sortable="true">الخامة</th>
            <th data-field="machine.name" data-formatter="machineFormat" data-filter-control="select"  data-sortable="true">الماكينة</th>
            <th data-field="cut_date"  data-filter-control="datepicker" data-filter-datepicker-options='{"format":"yyyy-mm-dd","autoclose":true,"todayHighlight":true,"clearBtn":true,"zIndexOffset":1035,"language":"ar","weekStart":6}' data-sortable="true">تاريخ النشر</th>
            <th data-field="length"  data-sortable="true">الطول</th>
            <th data-field="width"  data-sortable="true">العرض</th>
            <th data-field="thickness"  data-sortable="true">السمك</th>
            <th data-field="count" >عدد الترابيع</th>
            <th data-field="status" data-formatter="statusFormat" data-filter-control="select" data-sortable="true">الحاله</th>

        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>

<script>
    function statusFormat(value) {
            return value == "good" ? "جيد" : "دمار";
        }

        function positionFormat(value) {
            return value == "shipped" ? "تم شحنه" : "موجود";
        }

        function machineFormat(value , row) {
            return row.machine.name + "  " + row.machine.number;
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
