<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="{{app()->getLocale()==='ar' ? 'rtl' : 'ltr'}}">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard eCommerce - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="{{asset('assets/admin/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/vendors'.getDirection().'.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/selects/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/toggle/switchery.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/boxicons/css/boxicons.css')}}">


    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/'.getFolder().'/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/'.getFolder().'/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/pages/timeline.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/'.getFolder().'/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/mobiriseicons/24px/mobirise/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/core/colors/palette-switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/plugins/forms/switch.css')}}">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/style'.getDirection().'.css')}}">

    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


<!-- fixed-top-->
@include('dashboard.includes.header')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.includes.sidebar')

@yield('content')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.includes.footer')

@notify_js
@notify_render
<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/admin/vendors/js/charts/chartist.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/charts/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/charts/raphael-min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/charts/morris.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/timeline/horizontal-timeline.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/forms/select/select2.full.min.js')}}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/admin/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/switchery.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"></script>
<script src="{{asset('assets/admin/vendors/js/forms/select/select2.full.min.js')}}"></script>

<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/admin/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/admin/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets/admin/js/scripts/tables/datatables/datatable-styling.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<script src="{{asset('assets/script.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts/forms/switch.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts/forms/select/form-select2.js')}}"></script>



<!-- END: Page JS-->
@yield('script')

</body>
<!-- END: Body-->
</html>
