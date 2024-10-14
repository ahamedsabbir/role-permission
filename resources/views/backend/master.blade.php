<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.partials.meta')
        @include('backend.partials.style')
    </head>

    <!-- body start -->
    <body class="loading" data-layout-color="light"  data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            @include('backend.partials.header')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('backend.partials.left-sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    @yield('content') 
                    <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('backend.partials.footer')
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        @include('backend.partials.right-sidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        @include('backend.partials.script')
        
    </body>
</html>