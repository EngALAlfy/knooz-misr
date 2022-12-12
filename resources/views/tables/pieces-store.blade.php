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
            <th data-field="material.name"  data-filter-control="select"  data-sortable="true">الخامة</th>
            <th data-field="length" data-filter-control="input"  data-sortable="true">الطول</th>
            <th data-field="width" data-filter-control="input"  data-sortable="true">العرض</th>
            <th data-field="thickness" data-filter-control="input"  data-sortable="true">السمك</th>
            <th data-field="finish_type" data-formatter="FinishTypeFormat" data-filter-control="select"  data-sortable="true">التشطيب</th>
            <th data-field="count" data-filter-control="input" >عدد الترابيع</th>
            <th data-field="status" data-formatter="statusFormat" data-filter-control="select" data-sortable="true">الحاله</th>
            <th data-field="position" data-formatter="positionFormat" data-filter-control="select" data-sortable="true">الموقف</th>
            <th data-field="created_at" data-filter-control="datepicker" data-filter-datepicker-options='{"format":"yyyy-mm-dd","autoclose":true,"todayHighlight":true,"clearBtn":true,"zIndexOffset":1035,"language":"ar","weekStart":6}' >تاريخ</th>
            <th data-field="user.name" data-filter-control="select" data-sortable="true">بواسطة</th>

        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>

<script>


function FinishTypeFormat(value , row) {
        return value=="type1" ? "غشيم" : value=="type2" ?"هوند" : value=="type3" ?"براشد": value=="type4" ?"لامع مباشر": value=="type5" ?"لامع رماله" : value=="type6" ? "لامع" : value=="type7" ? "لامع معالج" : "N/A";
    }


    function statusFormat(value , row , index) {

        if(value == "broken"){

            $($(`#table tr`)[index+1]).addClass('text-danger');
            return "هدر";
        }
        if(value == "notgood"){

            $($(`#table tr`)[index+1]).addClass('text-danger');
            return "بها دمار";
        }
        if(value == "good"){

            return "جيدة";
        }

        }

        function positionFormat(value) {
            return value == "shipped" ? "تم شحنه" : "موجود";
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
