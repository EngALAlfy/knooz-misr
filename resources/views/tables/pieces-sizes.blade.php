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
           data-show-columns-toggle-all="true" data-data="{{ json_encode(array_keys($pieces)) }}" >
        <thead>
        <tr>
            <th data-field="id" data-formatter="sizeFormat" data-sortable="true">المقاس</th>
            <th data-field="id"  data-filter-control="select" data-formatter="materialFormat"  data-sortable="true">الخامة</th>
            <th data-field="id" data-formatter="blocksFormat"  data-filter-control="input"  data-sortable="true">البلوكات</th>
            <th data-field="count" data-formatter="countFormat" >عدد الترابيع</th>

        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>

<script>
    function sizeFormat(value , row) {
        return row.split(":")[0];
    }

    function materialFormat(value , row) {
        return row.split(":")[1];
    }

    function blocksFormat(value , row) {
        var items = JSON.parse('{!! json_encode($pieces) !!}')[row];
        var blocks = [];
        items.forEach(element => {
            blocks.push(element.block.number);
        });

        return blocks.join("-");
    }

    function countFormat(value , row) {
        var items = JSON.parse('{!! json_encode($pieces) !!}')[row];
        var count = 0;
        items.forEach(element => {
            count += element.count;
        });

        return count;
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
