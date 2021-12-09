<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @yield('head')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                @yield('navbar')
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                @yield('sidebar')
            </aside>

            @yield('content')

            <footer class="main-footer">
                @yield('footer')
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        @yield('scripts')
    </body>
</html>
