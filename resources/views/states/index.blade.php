@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
<!--         <a href="{{ route('states.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button> 
        </a> -->
        <a href="{{ route('states.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">
<div class="col-sm-12">
<form method="GET" action="{{ route('states.index') }}" enctype="multipart/form-data" id="filterForm" controller='states'>
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
                 <option value="{{ $countryId }}" {{ $selected}}>{{ $country }}</option>
               <?php } ?>   
           </select>
            
        </div>
    </div>
  </div>
  <!-- State -->
  <div class="col-sm-3">
   <div class="select-style-1">
       <label>State</label>
       <div class="select-position select-sm">
       <select class="jSelectbox" id="actionDropdown" name="state_id" required>
          <option value="">Select</option>  
           <?php 
              foreach ($stateList as $stateId => $state){
               $selected = ($selectedStateId == $stateId) ? 'selected' : '';
           ?>  
             <option value="{{ $stateId }}" {{ $selected}}>{{ $state }}</option>
           <?php } ?>   
       </select>
       </div>
    </div>
  </div>
  <!-- Reste -->
  <div class="col-sm-2">
   <a href="{{ route('states.index') }}">
    <button type="button" class="main-btn dark-btn btn-hover btn-xs" style="margin-top:28px">Reset</button>
   </a>
  </div>    
</div>    
</form>
</div>
</div>
<hr>    
<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th width="25"><div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1"></div></th>
<th><h6><a href="#">Country<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Name<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th class="text-center"><h6>Status</h6></th>    
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@php $class = '';
      $data = '';
@endphp

@foreach ($states as $state)    

<tr>
<td>
<div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1" ></div>
</td>
<td><p> {{ $state->country->name }} </p></td>
<td><p>{{ $state->name }}</p></td>
<td class="text-center">
  @php if($state->active == '1'){
    $class = 'activelabel';
    $data = 'Active';
    }
    else{
    $class = 'inactivelabel';
    $data = 'Inactive';
    } @endphp
    <div class="{{ $class; }}">{{ $data }}</div>
</td>  
<td class="text-center"><a href="{{ route('states.edit',$state->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('states.show',$state->id) }}"><i class="lni lni-list"></i></a>
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
@include('partials.pagination', ['items' => $states])
<!-- Pagination End here -->   
    <!--Add new section end here-->
	</div>
</section>
<script type="text/javascript">
    //  $(document).ready(function () {
    //    
    // });
</script>	
@endsection

