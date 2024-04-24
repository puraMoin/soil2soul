<!-- ======== sidebar-nav start =========== -->
<?php $currentRouteName = Route::currentRouteName(); ?>
<aside class="sidebar-nav-wrapper">
<div class="searchscroller">    
<div class="navbar-logo">
<a href="{{ route('dashboards.index') }}">
<img src="{{ asset('images/logo/logo.png') }} " alt="logo" />
</a>
</div>
<nav class="sidebar-nav">
<ul>
<?php 
// dd(Auth::user());
if((isset(Auth::user()->role_id)) && (Auth::user()->role_id != 1)){ ?>
@include('partials.userWiseMenu')	
<?php }else{ ?>
@include('partials.adminMenu')	
<?php } ?>	
</ul>
</nav>
</div>  
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->