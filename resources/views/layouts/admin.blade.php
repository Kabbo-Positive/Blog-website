<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ecommerce Shop') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->

    <link href="{{ asset('admin/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="wraper">
        @include('layouts.inc.sidebar')
        <div class="main-panel">
            @include('layouts.inc.adminnav')
            <div class="content" id="adminApp">
                @yield('content')
            </div>
            @include('layouts.inc.adminfooter')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/bootstrap-material-design.min.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('script')
    <script src="{{ asset('admin/js/admin-main.js') }}" defer></script>

    @if (session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif
    @yield('scripts')

</body>

</html>