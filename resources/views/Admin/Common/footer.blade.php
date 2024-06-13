<footer class="sl-footer">
    <div class="footer-left">
        <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
        <div>Made by ThemePixels.</div>
    </div>
    <div class="footer-right d-flex align-items-center">
        <span class="tx-uppercase mg-r-10">Share:</span>
        <a target="_blank" class="pd-x-5"
            href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i
                class="fa fa-facebook tx-20"></i></a>
        <a target="_blank" class="pd-x-5"
            href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i
                class="fa fa-twitter tx-20"></i></a>
    </div>
</footer>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="{{ asset('assets') }}/lib/jquery/jquery.js"></script>
<script src="{{ asset('assets') }}/lib/popper.js/popper.js"></script>
<script src="{{ asset('assets') }}/lib/bootstrap/bootstrap.js"></script>
<script src="{{ asset('assets') }}/lib/jquery-ui/jquery-ui.js"></script>
<script src="{{ asset('assets') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

  <script src="{{ asset('assets/lib/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('assets/lib/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
  <script src="{{ asset('assets/lib/select2/js/select2.min.js') }}"></script>

  <script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });


// Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>

<script src="{{ asset('assets') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
<script src="{{ asset('assets') }}/lib/d3/d3.js"></script>
<script src="{{ asset('assets') }}/lib/rickshaw/rickshaw.min.js"></script>
<script src="{{ asset('assets') }}/lib/chart.js/Chart.js"></script>
<script src="{{ asset('assets') }}/lib/Flot/jquery.flot.js"></script>
<script src="{{ asset('assets') }}/lib/Flot/jquery.flot.pie.js"></script>
<script src="{{ asset('assets') }}/lib/Flot/jquery.flot.resize.js"></script>
<script src="{{ asset('assets') }}lib/flot-spline/jquery.flot.spline.js"></script>
<script src="{{ asset('assets') }}/lib/spectrum/spectrum.js"></script>
<script src="{{ asset('assets') }}/js/starlight.js"></script>
<script src="{{ asset('assets') }}/js/ResizeSensor.js"></script>
<script src="{{ asset('assets') }}/js/dashboard.js"></script>
</body>

</html>
