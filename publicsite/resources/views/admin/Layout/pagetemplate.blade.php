<!doctype html>
<html class="no-js" lang="en">
<head>
@include('admin.Layout.head')
    @yield("head")
    @yield('style')
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Left menu area -->
@include('admin.Layout.leftmenu')
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">


    @yield("content")

</div>
@include('admin.Layout.script')
@yield('script')
</body>

</html>