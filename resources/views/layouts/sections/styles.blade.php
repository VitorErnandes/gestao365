<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/boxicons.css')) }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/core.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />

{{-- datatables --}}
<link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css" rel="stylesheet">
<link
    href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css"
    rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.min.css" rel="stylesheet">

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />


<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')
