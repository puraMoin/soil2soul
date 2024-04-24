@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('segments') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button> 
        </a>
        <span class="toggler" id="toggler-slideOne1"><span class="expandSlider" id="" style="cursor:pointer;">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></span></span>
    </div>
     
    <!--Add new section start here-->
    <div class="slider" id="slideOne1">
    <div class="card-style mt-20">
    <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> 
    <div class="row">
    <div class="col-sm-4">
    <div class="input-style-1">
    <label>Segment Name<span class="mandatory">*</span></label>
    <input type="text" placeholder="">
    </div>    
    </div>
    <div class="col-sm-4">
    <div class="textblack13">Status Information</div> 
    <div class="row mt-15">
    <div class="col-3">
    <div class="form-check generallabel mb-20">
    <input class="form-check-input" type="radio" value="" id="radio-1">
    <label class="form-check-label" for="radio-1">Active</label>
    </div>  
    </div>
    <div class="col-9">
    <div class="form-check generallabel mb-20">
    <input class="form-check-input" type="radio" value="" id="radio-2">
    <label class="form-check-label" for="radio-2">Inactive</label>
    </div>  
    </div>  
    </div>  
    </div>
    <div class="col-sm-4 right-mob-left">
    <div class="">
    <span class="toggler" id="toggler-slideOne1"><span class="collapseSlider" id="" style="cursor:pointer;">
    <button type="button" class="main-btn primary-btn btn-hover btn-sm">Add</button> <button type="button" class="main-btn primary-btn-outline btn-hover btn-sm">Close</button>
    </span></span>  
    </div>  
    </div>  
    </div>  
    </div>
    </div>    
    <!--Add new section end here-->
	</div>
</section>	
@endsection