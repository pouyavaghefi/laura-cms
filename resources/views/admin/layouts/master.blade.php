<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <title>
            @yield('title')
        </title>
        @include('admin.layouts.init.head')
        @yield('styles')
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            @include('admin.layouts.includes.overall.topbar')
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.includes.overall.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            @yield('wrapper')

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <!-- Footer -->
            @include('admin.layouts.includes.overall.footer')
            <!-- /Footer -->

            <!-- Right Sidebar -->
            @include('admin.layouts.includes.overall.notifications')
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->
        @include('admin.layouts.init.script')
        @yield('scripts')
    </body>
</html>
