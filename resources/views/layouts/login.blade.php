<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('assets/admin/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/vendors'.getDirection().'.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/icheck/custom.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/pages/login-register.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

    @notify_css

</head>
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page" data-open="click"
      data-menu="vertical-menu" data-col="1-column">
<!-- BEGIN: Content-->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>

<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}"></script>

<!-- BEGIN Vendor JS-->
assets/admin/
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/admin/vendors/js/forms/icheck/icheck.min.js')}}"></script>
<script src="{{asset('assets/admin//vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/admin/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/admin/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/admin/js/scripts/forms/form-login-register.js')}}"></script>
<!-- END: Page JS-->

<script>

</script>
@notify_js
@notify_render
</body>
</html>
