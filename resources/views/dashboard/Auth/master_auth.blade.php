<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="@if (config('app.locale') == 'ar') rtl @else ltr @endif">

@include('dashboard.Auth.parts.head')

<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- fixed-top-->
      @include('dashboard.Auth.parts.navbar')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @yield('content')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 @include('dashboard.Auth.parts.footer')
  <!-- BEGIN VENDOR JS-->
  @include('dashboard.Auth.parts.scripts')
  <!-- END PAGE LEVEL JS-->
</body>
</html>
