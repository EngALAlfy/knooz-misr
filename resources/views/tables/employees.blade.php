<div class="card">
    <div class="card-body" >
        <table id="table"
           data-toggle="table"
           data-show-columns="true"
           data-search="true"
           data-show-search-clear-button="true"
           data-show-print="true"
           dir="rtl"
           class="table table-striped text-right"
           data-buttons-align="left"
           data-search-align="left"
           data-show-fullscreen="true"
           data-toolbar-align="right"
           data-show-columns-toggle-all="true" data-data="{{$employees}}" >
        <thead>
        <tr>
            <th data-field="id" data-visible="false" data-sortable="true">ID</th>
            <th data-field="name"  data-sortable="true">الاسم</th>
            <th data-field="code"  data-sortable="true">الكود</th>
            <th data-field="job" data-sortable="true">الوظيفه</th>
            <th data-field="line.name" data-sortable="true">الخط</th>
            <th data-field="phone" >الهاتف</th>
            <th data-field="id" data-formatter="actionsFormat"  >اجراءات</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>


<script>

    function actionsFormat(value , row){
        var html = '<div style="display:flex;width:450px;">';

        html += '<div class="px-1"><a class="btn btn-info"><i class="fa fa-edit"></i> تعديل </a></div>';
        html += '<div class="px-1"><a class="btn btn-danger"><i class="fa fa-trash"></i> حذف </a></div>';

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
