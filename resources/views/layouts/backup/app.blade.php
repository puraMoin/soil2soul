<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <!-- ========== All CSS files linkup ========= -->
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
     <link rel="stylesheet" href="{{ asset('css/bootstrap.3.3.6.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/main.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/select2/select2.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/select2/select2-bootstrap.css') }} " />
    <link rel="stylesheet" href="{{ asset('css/custom_css/backend_developer.css') }} " />

    <script src="{{ asset('js/jq/jquery-1.12.0.min.js') }} "></script> 
    <script src="{{ asset('js/bootstrap.min.js') }} "></script> 
</head>
<body>
<!-- ======== sidebar-nav start =========== -->
@include('partials.sidemenu')
<!-- ======== sidebar-nav End =========== -->
<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
 <!-- ========== header Start  ========== -->    
@include('partials.navigationMenu')
<!-- ========== header end ========== -->
<!-- ========== Section Start ========== --> 
 @yield('content')
<!-- ========== Section end ========== -->           
<!-- ========== Footer Start ========== -->
@include('partials.footer')
<!-- ========== Footer End ========== -->
</main>
<!-- ======== main-wrapper end =========== -->
<!-- ========= All Javascript files linkup ======== -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }} "></script> 
<script src="{{ asset('js/Chart.min.js') }} "></script> 
<script src="{{ asset('js/dynamic-pie-chart.js') }} "></script> 
<script src="{{ asset('js/moment.min.js') }} "></script> 
<script src="{{ asset('js/fullcalendar.js') }} "></script> 
<script src="{{ asset('js/jvectormap.min.js') }} "></script> 
<script src="{{ asset('js/world-merc.js') }} "></script> 
<script src="{{ asset('js/polyfill.js') }} "></script> 
<script src="{{ asset('js/main.js') }} "></script>
<script src="{{ asset('js/jq/jquery.select2.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>


<!-- Toggle start here-->
<script type="text/javascript">
function toggleSlides(){
$('.toggler').click(function(e){
    var id=$(this).attr('id');
    var widgetId=id.substring(id.indexOf('-')+1,id.length);
    $('#'+widgetId).slideToggle();
    $(this).toggleClass('sliderExpanded');
    $('.closeSlider').click(function(){
            $(this).parent().hide('slow');
            var relatedToggler='toggler-'+$(this).parent().attr('id');
            $('#'+relatedToggler).removeClass('sliderExpanded');
    });
});
};
$(function(){
toggleSlides();
});

$(document).ready(function() {
        /*Get Method name*/
        $('#controllerDropdown').change(function() {
            var selectedController = $(this).val();
             $.ajax({
                url: "{{ route('get.methods.for.controller') }}",
                type: 'GET',
                data: { controller: selectedController },
              success: function(data) {
                 $('#methods').html('<option value="">Select Method</option>');
                var methods = data.methods.original; // Accessing the array of method names
                methods.forEach(function(method) {
                    $('#methods').append('<option value="' + method + '">' + method + '</option>');
                });
            }
            });
        });


        /*get route name For Selected Action and Controller*/
        $('#methods').change(function() {
            var selectedMethod = $(this).val();
            var selectedController = $('#controllerDropdown').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // alert(csrfToken);
           $.ajax({
           url: "{{ route('get.route.name') }}",
            type: 'POST',
            data: {
                controller: selectedController,
                method: selectedMethod,
                _token: csrfToken
            },
            success: function(data) {
                var dynamicName = data.routeName;
                // var dynamicRoute = "{{ url('') }}" + "/" + dynamicName;
                // $('#menuLinkUrl').val(dynamicName);
                var constructedValue = dynamicName;
                $('#menuLinkUrl').val(constructedValue);

                 $("#myModal").modal('hide');

            },
            error: function(xhr, status, error) {
                // Handle errors
            }
        });
        });

        $('.addAppendBtn').click(function(){
             $("#myModal").modal('show');
        });

    });
</script>
<!-- Toggle end here-->
</body>
</html>    