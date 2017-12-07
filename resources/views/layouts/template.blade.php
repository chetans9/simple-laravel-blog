<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    @yield('page_css')
</head>
<body>
    <!--start-header-->
    @include('includes.header')
    <!--End-header-->
    <!--Main-Content-->
    @yield('content')
    <!--Main-Content-end-->
    <!--footer-starts-->
    @include('includes.footer')
    <!--global-Js-->
    @include('includes.scripts')
    
    @yield('page_scripts')
</body>
</html>