
<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/adminLTE/plugins/moment/moment.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- chart -->
<script src="{{ asset('assets/adminLTE/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{ asset('assets/adminLTE/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('assets/adminLTE/plugins/flot/plugins/jquery.flot.axislabels.js')}}"></script>
<script src="{{ asset('assets/adminLTE/plugins/flot/plugins/jquery.flot.hover.js')}}"></script>
<script src="{{ asset('assets/adminLTE/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>


<script src="{{  asset('assets/js/FileSaver/FileSaver.min.js') }}"></script>

<script src="{{  asset('assets/js/js-xlsx/xlsx.core.min.js') }}"></script>

<script src="{{  asset('assets/js/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{  asset('assets/js/pdfmake/mirza_fonts.js') }}"></script>

<script src="{{  asset('assets/js/html2canvas/html2canvas (1).js') }}"></script>

<script src="{{  asset('assets/js/tableExport.js') }}"></script>

<script src="{{  asset('assets/js/bootstrap-table.min.js') }}"></script>
<script src="{{  asset('assets/js/bootstrap-table-print.min.js') }}"></script>
<script src="{{  asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{  asset('assets/js/bootstrap-table-filter-control.min.js')}}"></script>
<script src="{{  asset('assets/js/bootstrap-table-export.min.js')}}"></script>
<script src="{{  asset('assets/js/bootstrap-table-sticky-header.min.js')}}"></script>

    <!-- on loading scripts -->
    <script>

        $(function(){
            //Initialize Select2 Elements
            $('.select2').select2()
        });

    </script>





@yield('js')
