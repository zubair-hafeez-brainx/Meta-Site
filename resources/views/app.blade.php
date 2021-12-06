<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Meta-URL') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('frest/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('frest/vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/pages/app-invoice.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frest/vendors/css/extensions/sweetalert2.min.css')}}">

{{--    <script src="{{asset('js/dropzone/dist/dropzone.js')}}"></script>--}}
    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="vertical-layout boxicon-layout no-card-shadow 2-columns navbar-sticky footer-static pace-done pace-done menu-expanded vertical-menu-modern"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@inertia
<div id="noprogress" style="transition: none"></div>
</body>

<!-- Custom Scripts -->
<script>var assetBaseUrl = "{{ asset('/') }}";</script>
<script src="{{asset('frest/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('frest/vendors/js/pickers/daterange/moment.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('frest/fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
<script src="{{asset('frest/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
<script src="{{asset('frest/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
<script src="{{asset('frest/js/core/app-menu.js')}}"></script>
<script src="{{asset('frest/js/core/app.js')}}"></script>
<script src="{{asset('frest/js/scripts/components.js')}}"></script>
<script src="{{asset('frest/js/scripts/footer.js')}}"></script>
<script src="{{asset('frest/js/scripts/customizer.js')}}"></script>
<script src="{{asset('frest/assets/js/scripts.js')}}"></script>
<script src="{{asset('frest/js/scripts/configs/vertical-menu-light.js')}}"></script>
<script src="{{asset('frest/js/scripts/pages/app-invoice.js')}}"></script>
<script src="{{asset('frest/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/tables/datatable/responsive.bootstrap.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/extensions/dragula.min.js')}}"></script>
{{--<script src="{{asset('frest/vendors/js/plugins/extensions/toastr.min.js')}}"></script>--}}
<script src="{{asset('frest/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('frest/js/scripts/extensions/sweet-alerts.js')}}"></script>
<script src="{{asset('frest/js/scripts/extensions/sweet-alerts.min.js')}}"></script>
<script src="{{asset('frest/js/scripts/navs/navs.js')}}"></script>
<script src="{{asset('frest/js/scripts/tooltip/tooltip.js')}}"></script>
<script src="{{asset('frest/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/tables/datatable/responsive.bootstrap.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/extensions/dragula.min.js')}}"></script>
<script src="{{asset('frest/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
</html>
