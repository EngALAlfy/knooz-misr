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
           data-show-columns-toggle-all="true" data-data="{{$materials}}" >
        <thead>
        <tr>
            <th data-field="id" data-print-ignore="true" data-visible="false" data-sortable="true">ID</th>
            <th data-field="name"  data-sortable="true">الاسم</th>
            <th data-field="color"  data-sortable="true">اللون</th>
            <th data-field="blocks_count"  data-sortable="true">عدد البلوكات</th>
            <th data-field="cut_blocks_count"  data-sortable="true">عدد لبلوكات تم نشرها</th>
            <th data-field="current_blocks_count"  data-sortable="true">عدد البلوكات الموجودة</th>
            <th data-field="id" data-formatter="piecesCountFormat"  data-sortable="true">عدد الترابيع</th>
            <th data-field="speed" data-visible="false" data-sortable="true">سرعة النشر</th>
            <th data-field="id" data-formatter="actionsFormat">اجراءات</th>
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

<script>
    function piecesCountFormat(value , row) {
        var count = 0;

        row.cut_blocks.forEach(block => {
            block.pieces.forEach(piece => {
                count +=   piece.count;
            });
        });

        return count;
    }
</script>
