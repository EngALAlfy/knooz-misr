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
           data-show-filter-control-switch="true"
           data-filter-control="true"
           data-filter-control-visible="false"
           data-sticky-header="true"
           data-sticky-header="true"
           data-detail-view="true"
           data-pagination="true"
           data-show-pagination-switch="true"
           data-page-list="[10 , 50 , 100 ,300 , 500]"
           data-detail-formatter="detailFormat"
           data-sticky-header-offset-y="57"
           data-sticky-header-offset-left="36"
           data-show-columns-toggle-all="true" data-data="{{$blocks}}" >
        <thead>
        <tr>
            <th data-field="id" data-visible="false" data-sortable="true">ID</th>
            <th data-field="number" data-filter-control="input"  data-sortable="true">رقم البلوك</th>
            <th data-field="material.name"  data-filter-control="select"  data-sortable="true">الخامة</th>
            <th data-field="machine.name" data-formatter="machineFormat" data-filter-control="select"  data-sortable="true">الماكينة</th>
            <th data-field="recive_date" data-filter-control="datepicker" data-filter-datepicker-options='{"format":"yyyy-mm-dd","autoclose":true,"todayHighlight":true,"clearBtn":true,"zIndexOffset":1035,"language":"ar","weekStart":6}'  data-sortable="true">تاريخ الاستلام</th>
            <th data-field="cut_date"  data-filter-control="datepicker" data-filter-datepicker-options='{"format":"yyyy-mm-dd","autoclose":true,"todayHighlight":true,"clearBtn":true,"zIndexOffset":1035,"language":"ar","weekStart":6}' data-sortable="true">تاريخ النشر</th>
            <th data-field="length_before"  data-sortable="true">الطول قبل الخصم</th>
            <th data-field="width_before"  data-sortable="true">العرض قبل الخصم</th>
            <th data-field="height_before"  data-sortable="true">الارتفاع قبل الخصم</th>
            <th data-field="id" data-formatter="volumeBeforeFormat" data-sortable="true">الحجم قبل الخصم</th>
            <th data-field="length_after"  data-sortable="true">الطول بعد الخصم</th>
            <th data-field="width_after"  data-sortable="true">العرض بعد الخصم</th>
            <th data-field="height_after"  data-sortable="true">الارتفاع بعد الخصم</th>
            <th data-field="id" data-formatter="volumeAfterFormat"  data-sortable="true">الحجم بعد الخصم</th>
            <th data-field="strips" data-formatter="stripsCountFormat" data-sortable="true">عدد الطاولات</th>
            <th data-field="pieces" data-formatter="piecesCountFormat" data-sortable="true">عدد الترابيع</th>
            <th data-field="status" data-formatter="statusFormat" data-filter-control="select" data-sortable="true">الحاله</th>
            <th data-field="position" data-formatter="positionFormat"  data-filter-control="select" data-sortable="true">الموقف</th>
            <th data-field="id" data-formatter="actionsFormat"  >اجراءات</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>

</div>


<script>
    function detailFormat(index , row ) {

        if(row.position == "current"){
            return 'لم يتم نشر البلوك بعد.';
        }

        if(row.strips.length <= 0){
            return 'لم يتم اضافة طاولات للبلوك بعد.';
        }

        var block_height = row.height_after;
        var block_length = row.length_after;
        var block_width = row.width_after;

        var strip_thickness = row.strips[0].thickness;
        var strip_length = row.strips[0].length;
        var strip_width = row.strips[0].width;

        var cut_length = 0;
        // get the strip dims for the block
        if(block_height == strip_length && block_width == strip_width || block_width == strip_length &&  block_height == strip_width){
            cut_length = block_length;
        }

        if(block_length == strip_length && block_width == strip_width || block_width == strip_length &&  block_length == strip_width){
            cut_length = block_height;
        }

        if(block_length == strip_length && block_height == strip_width || block_height == strip_length &&  block_length == strip_width){
            cut_length = block_width;
        }

        // get the saws count (same as strips almost)
        var saws_count = Math.floor(cut_length / strip_thickness);
        // each saw is 6 mm
        var saws_length = 0.6 * saws_count;
        // get the pure length
        var pure_cut_length = cut_length - saws_length;

        var strips_count = Math.floor(pure_cut_length / strip_thickness);

        var actual_strips_count = 0;
        row.strips.forEach(strip => {
            actual_strips_count +=   strip.count;
        });


        var html = '<div class="row" style="max-width:500px;">';

        html += '<div class="col-6"> طول اتجاه النشر : '+cut_length+' سم</div>';
        html += '<div class="col-6"> عدد المناشير : '+saws_count+' منشار</div>';
        html += '<div class="col-6"> طول المناشير : '+saws_length+' سم</div>';
        html += '<div class="col-6"> طول اتجاه النشر الصافي  : '+pure_cut_length+' سم</div>';
        html += '<div class="col-6"> نسبة هدر المناشير : '+(((cut_length-pure_cut_length)/pure_cut_length)*100).toFixed(1)+'%</div>';
        html += '<div class="col-6"> عدد الطاولات القياسي : '+strips_count+' طاولة</div>';
        html += '<div class="col-6"> عدد الطاولات الفعلي : '+actual_strips_count+' طاولة</div>';
        html += '<div class="col-6"> نسبة الطاولات الفعلي : '+((actual_strips_count/strips_count)*100).toFixed(1)+'%</div>';

        html += '</div>';

        return html;
    }

    function statusFormat(value) {
        if (value == "good") {
            return "جيد";
        } else if(value == "broken"){
            return "هدر";
        }else{
            return "به دمار";
        }
    }

    function positionFormat(value) {
        if(value === 'cut'){
            return "تم نشره";
        }else{
            return "موجود";
        }
    }

    function machineFormat(value , row) {
        if(!row.machine){
            return '--';
        }
        return row.machine?.name + "  " + row.machine?.number;
    }

    function volumeAfterFormat(value , row) {
        return (row.length_after * row.width_after * row.height_after)/10000;
    }

    function volumeBeforeFormat(value , row) {
        return (row.length_before * row.width_before * row.height_after)/10000;
    }


    function piecesCountFormat(value , row) {
        var count = 0;

        row.pieces.forEach(piece => {
                count +=   piece.count;
        });


        return count;
    }


    function stripsCountFormat(value , row) {
        var count = 0;

        row.strips.forEach(strip => {
                count +=   strip.count;
            });

        return count;
    }


    function actionsFormat(value , row){
        var html = '<div style="display:flex;width:450px;">';

        html += '<div class="px-1"><a href="{{ url('/knooz-misr/factory-7') }}/blocks/'+value+'/edit" class="btn btn-info"><i class="fa fa-edit"></i> تعديل </a></div>';
        html += '<div class="px-1"><a  class="btn btn-success"><i class="fa fa-plus-circle"></i> اضافه طاولات </a></div>';
        html += '<div class="px-1"><a class="btn btn-primary"><i class="fa fa-plus"></i> اضافة ترابيع </a></div>';
        @can('delete' , \App\Models\Block::class)
            html += '<div class="px-1"><a href="{{ url('/knooz-misr/factory-7') }}/blocks/'+value+'/delete" class="btn btn-danger"><i class="fa fa-trash"></i> حذف </a></div>';
        @endcan
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
