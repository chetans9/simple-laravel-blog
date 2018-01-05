<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.admin.head')
    @yield('page_css')

</head>

<body>
<!--wrapper -->
<div id="wrapper">

@include('includes.admin.header')

<!-- page-wrapper -->
    <div id="page-wrapper">
        
    @yield('content')
    <!-- /.row -->

        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript">
    var APP_URL = "{{url('/')}}";
</script>
<!-- jQuery -->

<script src="{{URL::asset('back/js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('back/js/bootstrap.min.js')}}"></script>


<!-- Metis Menu Plugin JavaScript -->
<script src="{{URL::asset('back/js/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{URL::asset('back/js/sb-admin-2.js')}}"></script>
<script src="{{URL::asset('back/datatables/datatables.min.js')}}"></script>
<script src="{{URL::asset('back/js/global.js')}}"></script>
@yield('page_scripts')

</body>

</html>

