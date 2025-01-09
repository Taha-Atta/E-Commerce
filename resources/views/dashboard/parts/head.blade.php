<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard @yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/dashboard') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard') }}/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css"
    href="{{ asset('assets/dashboard') }}/vendors/css/weather-icons/climacons.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/fonts/meteocons/style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/vendors/css/charts/morris.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/vendors/css/charts/chartist.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/dashboard') }}/vendors/css/charts/chartist-plugin-tooltip.css">
<!-- END VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/fonts/simple-line-icons/style.css">
    @if (config('app.locale') == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css-rtl/vendors.css">
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css-rtl/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css-rtl/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css-rtl/pages/timeline.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css-rtl/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/style-rtl.css">
    <!-- END Custom CSS-->

    {{-- <style>
        .dt-search {
            margin-right: 90ch !important;
        }
    </style> --}}
    @else
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/vendors.css">
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/custom.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css/core/colors/palette-gradient.css">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/dashboard') }}/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/css/style.css">
    <!-- END Custom CSS-->
    @endif
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/af-2.7.0/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/cr-2.0.4/date-1.5.4/fc-5.0.4/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.1/rr-1.5.0/sc-2.4.3/sb-1.8.1/sp-2.3.3/sl-2.1.0/sr-1.4.1/datatables.min.css" rel="stylesheet">


    <style>
        table.dataTable thead th {
            text-align: center;
        }
        table.dataTable tbody tr {
            text-align: center;
        }
    </style>

    {{-- file input --}}
<link rel="stylesheet" href="{{ asset('vendor/file-input/css/fileinput.min.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous">

{{-- end file input --}}




</head>
