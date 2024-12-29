<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

@include('dashboard.parts.head')

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- fixed-top-->
        @include('dashboard.parts.navbar')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
        @include('dashboard.parts.sidebar')
        @yield('content')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('dashboard.parts.footer')
    @include('dashboard.parts.scripts')
    @stack('js')
</body>

</html>
