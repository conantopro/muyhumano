<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('back.partials.back-head')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('back.partials.back-navbar')
            @include('back.partials.back-sidebar')
            @yield('content')
            @include('back.partials.back-footer')
        </div>
        @include('back.partials.back-scripts')
    </body>
</html>