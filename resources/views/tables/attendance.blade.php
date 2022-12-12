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
            @for ($i = 1 ; $i <= \Carbon\Carbon::now()->daysInMonth ; $i++)
            <th data-field="{{$i}}" data-formatter="attendFormat">{{$i}}</th>
            @endfor
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>


<script>

    function attendFormat(value , row , index , field){
        attendance = {};

        row.attendance.forEach(element => {
            if(!element){
                return;
            }

            if((new Date(element.date)).getDate() == field){
                attendance = element;
            }
        });

        if(attendance.status == "attend"){return "حضور";}
        if(attendance.status == "absent"){return "غياب";}
        if(attendance.status == "reason"){return "عذر";}
        if(attendance.status == "holiday"){return "اجازة";}

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
