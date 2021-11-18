
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016
        <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>

</div><!-- end of wrapper -->






{{--<!-- Bootstrap 3.3.7 -->--}}

<script src="{{url('/')}}/TableDesign/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="{{url('/')}}/panel/adminpanel/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/panel/adminpanel/plugins/datatables/dataTables.bootstrap.min.js"></script>


<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>


{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('dashboard_files/js/adminlte.min.js') }}"></script>

{{--ckeditor standard--}}
<script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>

{{--jquery number--}}
<script src="{{ asset('dashboard_files/js/jquery.number.min.js') }}"></script>

{{--print this--}}
<script src="{{ asset('dashboard_files/js/printThis.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

{{--morris --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('dashboard_files/plugins/morris/morris.min.js') }}"></script>

{{--custom js--}}
<script src="{{ asset('dashboard_files/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('dashboard_files/js/custom/order.js') }}"></script>

<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="{{url('/')}}/TableDesign/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/vendor/datatables/buttons.server-side.js"></script>
<script src="{{url('/')}}/TableDesign/vendor/bootstrap/js/popper.js"></script>
<script src="{{url('/')}}/TableDesign/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('/')}}/TableDesign/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{url('/')}}/TableDesign/js/main.js"></script>
<script src="{{asset('/js/generalScript.js')}}"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
<script>
    $(document).ready(function () {


        CKEDITOR.config.language =  "{{ app()->getLocale() }}";

    });//end of ready



</script>

@stack('js')
@stack('css')
@stack('Sjs')
</body>
</html>
