


<footer class="main-footer">
    <strong>Copyright &copy; 2020 MAN 1 PEKANBARU</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <strong>Copyright &copy; 2020 <a href="<?php echo base_url(); ?>">MAN 1 PEKANBARU</a>.</strong> All rights reserved.
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!--<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/sparklines/sparkline.js"></script>-->
<!-- JQVMap -->
<!--<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/jqvmap/jquery.vmap.min.js"></script>-->
<!--<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
jquery.kno<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/jquery-knob/jquery.knob.min.js"></script>-->
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<!--<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/summernote/summernote-bs4.min.js"></script>-->
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/assets/adminLTE3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/adminLTE3/dist/js/adminlte.js"></script>
<!-- jQuery UI 1.11.2 -->
<!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
<script type="text/javascript">
    var windowURL = window.location.href;
    pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
    var x= $('a[href="'+pageURL+'"]');
    x.addClass('active');
    x.parent().addClass('active');
    var y= $('a[href="'+windowURL+'"]');
    y.addClass('active');
    y.parent().addClass('active');
</script>
</body>
</html>
