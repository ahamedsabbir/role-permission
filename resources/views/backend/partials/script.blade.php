<!-- Vendor -->
<script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/feather-icons/feather.min.js"></script>

<!-- third party js -->
@stack('datatablejs')

<!-- third party js ends -->

<!-- knob plugin -->
<script src="{{ asset('backend') }}/assets/libs/jquery-knob/jquery.knob.min.js"></script>

<!--Morris Chart-->
<script src="{{ asset('backend') }}/assets/libs/morris.js06/morris.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/raphael/raphael.min.js"></script>

<!-- Dashboar init js-->
<script src="{{ asset('backend') }}/assets/js/pages/dashboard.init.js"></script>

<!-- App js-->
<script src="{{ asset('backend') }}/assets/js/app.min.js"></script>

@stack('scripts')