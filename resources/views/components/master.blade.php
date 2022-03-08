<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rasmus Army Sales App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{asset("ui/plugins/fontawesome-free/css/all.min.css")}}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href={{asset("ui/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
  <!-- iCheck -->
  <link rel="stylesheet" href={{asset("ui/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
  <!-- JQVMap -->
  <link rel="stylesheet" href={{asset("ui/plugins/jqvmap/jqvmap.min.css")}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset("ui/dist/css/adminlte.min.css")}}>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{asset("ui/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{asset("ui/plugins/daterangepicker/daterangepicker.css")}}>
  <!-- summernote -->
  <link rel="stylesheet" href={{asset("ui/plugins/summernote/summernote-bs4.min.css")}}>


  <!-- include libraries(jQuery, bootstrap) -->
  <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
  <script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- include summernote css/js-->
  <link href="summernote-bs5.css" rel="stylesheet">
  <script src="summernote-bs5.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->

  <!-- Navbar -->
  <x-partials.nav_bar></x-partials.nav_bar>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <x-partials.left_side_bar></x-partials.left_side_bar>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
  {{ $slot }}
  </div>
  <!-- /.content-wrapper -->
 <x-partials.footer></x-partials.footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src={{ asset("ui/plugins/jquery/jquery.min.js") }}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{ asset("ui/plugins/jquery-ui/jquery-ui.min.js") }}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{ asset("ui/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<!-- ChartJS -->
<script src={{ asset("ui/plugins/chart.js/Chart.min.js") }}></script>
<!-- Sparkline -->
<script src={{ asset("ui/plugins/sparklines/sparkline.js") }}></script>
<!-- JQVMap -->
<script src={{ asset("ui/plugins/jqvmap/jquery.vmap.min.js") }}></script>
<script src={{ asset("ui/plugins/jqvmap/maps/jquery.vmap.usa.js") }}></script>
<!-- jQuery Knob Chart -->
<script src={{ asset("ui/plugins/jquery-knob/jquery.knob.min.js") }}></script>
<!-- daterangepicker -->
<script src={{ asset("ui/plugins/moment/moment.min.js") }}></script>
<script src={{ asset("ui/plugins/daterangepicker/daterangepicker.js") }}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset("ui/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script>
<!-- Summernote -->
<script src={{ asset("ui/plugins/summernote/summernote-bs4.min.js") }}></script>
<!-- overlayScrollbars -->
<script src={{ asset("ui/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("ui/dist/js/adminlte.js") }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ asset("ui/dist/js/demo.js") }}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset("ui/dist/js/pages/dashboard.js") }}></script>

<!-- jquery for orders table -->
<script>
  $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>

</body>
</html>
