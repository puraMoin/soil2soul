@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
<!--         <a href="{{ route('countries.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button> 
        </a> -->
        <a href="{{ route('countries.add') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">
<div class="col-sm-12">
<form method="GET" action="{{ route('countries.index') }}" enctype="multipart/form-data" id="filterForm" controller='countries'>
<div class="row">
  <!-- Countries -->
  <div class="col-sm-3">
   <div class="select-style-1">
       <label>Country</label>
       <div class="select-position select-sm">
       <select class="jSelectbox" id="actionDropdown" name="country_id" required>
          <option value="">Select</option>  
           <?php 
              foreach ($countryList as $countryId => $country){
               $selected = ($selectedCountryId == $countryId) ? 'selected' : '';
           ?>  
             <option value="{{ $countryId }}" {{$selected}}>{{ $country }}</option>
           <?php } ?>   
       </select>
       </div>
    </div>
  </div>
  <!-- Country Status -->
  <div class="col-sm-3">
   <div class="select-style-1">
       <label>Status</label>
       <div class="select-position select-sm">
       <select class="jSelectbox" id="status" name="active" required>
          <option value="">Select</option>  
          <?php 
             foreach ($countryStatus as $display => $value) { 
              $checked = ($statusValue == $value) ? 'selected' : '';
           ?>
           <option value="{{ $value }}" {{$checked}}>{{ $display }}</option>
           <?php } ?>   
       </select>
       </div>
    </div>
  </div>
  <!-- Resate -->
  <div class="col-sm-2">
   <a href="{{ route('countries.index') }}">
    <button type="button" class="main-btn dark-btn btn-hover btn-xs" style="margin-top:28px">Reset</button>
   </a>
  </div>
</div> 
</form>
<!-- <div class="searchfield">
<input type="text" placeholder="Search...">
<button><i class="lni lni-search-alt"></i></button>
</div> -->  

</div>

<!-- <div class="col-sm-4 rowmargin10">
<div class="right-mob-left"><button type="button" class="main-btn dark-btn btn-hover btn-xs">Export</button></div>
</div> -->  
</div>
<hr>    
<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th width="25"><div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1"></div></th>
<th><h6><a href="#">Country <i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#"> Alpha 2 Code <i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Alpha 3 Code<i class="lni lni-sort-alpha-asc"></i></a></h6></th>    
<th><h6>Calling Code</h6></th>
<th class="text-center"><h6>Status</h6></th>    
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@php $class = '';
      $data = '';
@endphp

@foreach ($countries as $country)    

<tr>
<td><div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1" ></div></td>
<td><p> @if ($country->countryDetails->isNotEmpty())
  @php
      $firstImage = $country->countryDetails->first()->icon_image;

      $id = $country->countryDetails->first()->id;

      $imagePath = $firstImage ? asset("images/country_details/icon_image/{$id}/{$firstImage}") : null;
      
      //dd($imagePath);

  @endphp
  @if(!empty($imagePath))
  <img src="{{ $imagePath }}" class='countryIcon'>
   @endif
  @endif
{{ $country->name }}</p></td>
<td><p>{{ $country->alpha_2_code }}</p></td>
<td><p>{{ $country->alpha_3_code }}</p></td>    
<td><p>{{ $country->calling_code }}</p></td>
<td class="text-center">
  @php if($country->active == '1'){
    $class = 'activelabel';
    $data = 'Active';
    }
    else{
    $class = 'inactivelabel';
    $data = 'Inactive';
    } @endphp
    <div class="{{ $class; }}">{{ $data }}</div>
</td>  
<td class="text-center"><a href="{{ route('countries.edit',$country->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('countries.show',$country->id) }}"><i class="lni lni-list"></i></a>
</td>

</tr>

@endforeach
<!-- end table row -->

 
</tbody>
</table>
<!-- end table -->
</div>
</div>
<!-- Pagination Start Here -->
@include('partials.pagination', ['items' => $countries])
<!-- Pagination End here -->   
<!--Add new section end here-->
	</div>
</section>	
@endsection



