<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Footer -->
<footer class="main-footer">

    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?> SIBEA SMART</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="<?php echo base_url() ?>/assets/admin/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url() ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/assets/admin/dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/assets/admin/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>/plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "lengthMenu": [
                [100, 200, 300, 400, 500, -1],
                [100, 200, 300, 400, 500, "All"]
            ],
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.


        var areaChartData = {
            labels: ['Periode Ganjil T.A 2021/2022', 'Periode Genap T.A 2021/2022'],
            datasets: [{
                    label: 'Jumlah Pendaftar',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [530, 0]
                },
                {
                    label: 'Jumlah Mahasiswa Mendapat Beasiswa',
                    backgroundColor: '#006400',
                    borderColor: '#006400',
                    pointRadius: false,
                    pointColor: '#006400',
                    pointStrokeColor: '#006400',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: '#006400',
                    data: [30, 0]
                },

            ]
        }
        //-------------
        //- BAR CHART -
        //-------------

        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp0
        barChartData.datasets[1] = temp1

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: true
        }

        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    })
</script>
</body>

</html>