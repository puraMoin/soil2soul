<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In New | ETOS 2.0</title>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/main.css') }} " />

    <script src="{{ asset('js/jq/jquery-1.12.0.min.js') }} "></script> 
    <script src="{{ asset('js/bootstrap.min.js') }} "></script> 
</head>
<body>
<!-- ======== main-wrapper start =========== -->
<main class="login-wrapper">
 @yield('content')
<!-- ========== footer start =========== -->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 order-last order-md-first">
          <div class="copyright text-center text-md-start">
            <p class="text-sm"> Developed by Puratech Consultancy Solutions Pvt. Ltd. </a> </p>
          </div>
        </div>
        <!-- end col-->
        <div class="col-md-6">
          <div class="terms d-flex justify-content-center justify-content-md-end">
              <a href="#0" class="text-sm">Term & Conditions</a> <a href="#0" class="text-sm ml-15">Privacy & Policy</a> </div>
        </div>
      </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </footer>
  <!-- ========== footer end =========== -->  
</main>
<!-- ======== main-wrapper end =========== --> 
<!-- ========= All Javascript files linkup ======== --> 

<!-- <script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script> 
<script src="{{ asset('js/Chart.min.js') }} "></script> 
<script src="{{ asset('js/dynamic-pie-chart.js') }} "></script> 
<script src="{{ asset('js/moment.min.js') }} "></script> 
<script src="{{ asset('js/fullcalendar.js') }} "></script> 
<script src="{{ asset('js/jvectormap.min.js') }} "></script> 
<script src="{{ asset('js/world-merc.js') }} "></script> 
<script src="{{ asset('js/polyfill.js') }} "></script> 
<script src="{{ asset('js/main.js') }} "></script> -->
</body>
</html>