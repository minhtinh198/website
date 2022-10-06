<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('public/Admin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('public/Admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/Admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/Admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('public/Admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('public/Admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/Admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('public/Admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('public/Admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  
  <link href="{{asset('public/Admin/assets/css/main.css')}}" rel="stylesheet">


</head>

<body>
  @include('partials.header')
  
  @include('partials.sidebar')
  
  @yield('content')

  {{-- @include('partials.footer') --}}


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/Admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('public/Admin/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('public/Admin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('public/Admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('public/Admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('public/Admin/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('public/Admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('public/Admin/assets/vendor/echarts/echarts.min.js')}}"></script>

  
  <script src="{{asset('public/Admin/assets/js/main.js')}}"></script>

</body>

</html>