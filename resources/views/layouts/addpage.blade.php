<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/Ionicons/css/ionicons.min.css">
   <!-- jvectormap -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{{config('global.BACKENDCMS')}}/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    
</head>
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
@include('layouts.header')    
@include('layouts.sidebar')    
@yield('content')
</div>
<!-- jQuery 3 -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{config('global.BACKENDCMS')}}/backend/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{config('global.BACKENDCMS')}}/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- bootstrap datepicker -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{config('global.BACKENDCMS')}}/backend/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{config('global.BACKENDCMS')}}/backend/dist/js/demo.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/bower_components/ckeditor/ckeditor.js"></script>
<script src="{{config('global.BACKENDCMS')}}/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor11')
    CKEDITOR.replace('editor12')
    CKEDITOR.replace('editor13')
    CKEDITOR.replace('editor14')
     //Date picker
    $('#datepicker').datepicker({
      format: 'mm-dd-yyyy',
      autoclose: true
    })
    $('#datepicker1').datepicker({
      format: 'mm-dd-yyyy',
      autoclose: true
    })
    $('#datepicker2').datepicker({
      format: 'mm-dd-yyyy',
      autoclose: true
    })
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
  })
</script>

</body>
</html>
