<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>AdminLTE 2 | Starter</title> -->
    <title>{{ config('app.name', 'Laravel') }}</title>  

    <link rel="stylesheet" href="{{ asset('/assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte/plugins/iCheck/all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('/assets/adminlte/dist/css/skins/skin-blue.min.css') }}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <!-- DataTable style -->
    @stack('DatatableCSS')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Header -->
      @include('admin-layouts.header')

      <!-- Sidebar -->
      @include('admin-layouts.sidebar')

      <!-- Main Content -->
      @yield('admin-content')    

      <!-- Footer -->
      @include('admin-layouts.footer')

      <!-- Control Sidebar -->
      @include('admin-layouts.controlSidebar')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="{{ asset('/assets/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
        Both of these plugins are recommended to enhance the
        user experience. -->

    <!-- SlimScroll -->
    <script src="{{ asset('/assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>    
    <!-- FastClick -->
    <script src="{{ asset('/assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>    
    <!-- InputMask -->
    <script src="{{ asset('/assets/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/assets/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('/assets/adminlte/plugins/iCheck/icheck.min.js') }}"></script>    
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/adminlte/dist/js/adminlte.min.js') }}"></script>      
    <!-- DataTables JavaScript -->
    @stack('DatatableJS')
    <!-- Custom JavaScript -->
    <script src="{{ asset('/js/custom.js') }}"></script>


    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        // $('.select2').select2()

        //Datemask dd/mm/yyyy
        // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        // $('[data-mask]').inputmask()

        //Date range picker
        // $('#reservation').daterangepicker()
        //Date range picker with time picker
        // $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
        //Date range as a button
        // $('#daterange-btn').daterangepicker(
        //   {
        //     ranges   : {
        //       'Today'       : [moment(), moment()],
        //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        //     },
        //     startDate: moment().subtract(29, 'days'),
        //     endDate  : moment()
        //   },
        //   function (start, end) {
        //     $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        //   }
        // )

        //Date picker
        // $('#datepicker').datepicker({
        //   autoclose: true
        // })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        // $('.my-colorpicker1').colorpicker()
        //color picker with addon
        // $('.my-colorpicker2').colorpicker()

        //Timepicker
        // $('.timepicker').timepicker({
        //   showInputs: false
        // })
      })
    </script>

  </body>
</html>