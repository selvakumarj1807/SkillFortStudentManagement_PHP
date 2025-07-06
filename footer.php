<!-- Latest jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 3.3.2 JS (If not loaded globally) -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>



<!-- Other required plugins -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
<script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="dist/js/app.min.js" type="text/javascript"></script>
<script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
<script src="dist/js/demo.js" type="text/javascript"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#bootstrapdatatable').DataTable({
            "aLengthMenu": [
                [3, 5, 10, 25, -1],
                [3, 5, 10, 25, "All"]
            ],
            "iDisplayLength": 3,
            responsive: true
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#bootstrapdatatable01').DataTable({
            "aLengthMenu": [
                [3, 5, 10, 25, -1],
                [3, 5, 10, 25, "All"]
            ],
            "iDisplayLength": 3
        });
    });
</script>


</body>

</html>