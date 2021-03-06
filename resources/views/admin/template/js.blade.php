    <!-- jquery
		============================================ -->
        <script src="{{ asset('template') }}/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/bootstrap.min.js"></script>
        <!-- wow JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/wow.min.js"></script>
        <!-- price-slider JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/owl.carousel.min.js"></script>
        <!-- sticky JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/jquery.sticky.js"></script>
        <!-- scrollUp JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/jquery.scrollUp.min.js"></script>
        <!-- counterup JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/counterup/jquery.counterup.min.js"></script>
        <script src="{{ asset('template') }}/js/counterup/waypoints.min.js"></script>
        <script src="{{ asset('template') }}/js/counterup/counterup-active.js"></script>
        <!-- mCustomScrollbar JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="{{ asset('template') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
        <!-- metisMenu JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/metisMenu/metisMenu.min.js"></script>
        <script src="{{ asset('template') }}/js/metisMenu/metisMenu-active.js"></script>

        <!-- summernote JS
		============================================ -->
        <!-- include summernote css/js -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        <!-- morrisjs JS
            ============================================ -->
        {{-- <script src="{{ asset('template') }}/js/morrisjs/raphael-min.js"></script>
        <script src="{{ asset('template') }}/js/morrisjs/morris.js"></script>
        <script src="{{ asset('template') }}/js/morrisjs/morris-active.js"></script> --}}
        <!-- morrisjs JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/sparkline/jquery.sparkline.min.js"></script>
        <script src="{{ asset('template') }}/js/sparkline/jquery.charts-sparkline.js"></script>
        <script src="{{ asset('template') }}/js/sparkline/sparkline-active.js"></script>
        <!-- calendar JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/calendar/moment.min.js"></script>
        <script src="{{ asset('template') }}/js/calendar/fullcalendar.min.js"></script>
        <script src="{{ asset('template') }}/js/calendar/fullcalendar-active.js"></script>



        <!-- tab JS
		============================================ -->
        <script src="{{ asset('template') }}/js/tab.js"></script>
        <!-- plugins JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/plugins.js"></script>
        <!-- main JS
            ============================================ -->
        <script src="{{ asset('template') }}/js/main.js"></script>

        <script>
            $(document).ready(function() {
                // $('#summernote').summernote();
                $('#summernote').summernote({
                    height: 450,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    // focus: true                  // set focus to editable area after initializing summernote
                });
            });
        </script>

