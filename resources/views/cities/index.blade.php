@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('cities.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button> 
        </a>
        <a href="{{ route('cities.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">
<div class="col-sm-12">
<form method="GET" action="{{ route('cities.index') }}" enctype="multipart/form-data" id="filterForm" controller='cities'>
<div class="row">
        <!-- City -->
  <div class="col-sm-3">
    <label>City</label>
    <div class="searchfield">
    <input type="text" placeholder="Search..." name="id" value="{{ $searchId }}">
    <button><i class="lni lni-search-alt"></i></button>
    <div id="suggestions"></div>
    </div>
  </div>
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

    <!-- City Status -->
  <div class="col-sm-3">
   <div class="select-style-1">
       <label>Status</label>
       <div class="select-position select-sm">
       <select class="jSelectbox" id="status" name="active" required>
          <option value="">Select</option>  
          <?php 
             foreach ($cityStatus as $display => $value) { 
              $checked = ($statusValue == $value) ? 'selected' : '';
           ?>
           <option value="{{ $value }}" {{$checked}}>{{ $display }}</option>
           <?php } ?>   
       </select>
       </div>
    </div>
  </div>
  <!-- Reset -->
  <div class="col-sm-2">
   <a href="{{ route('cities.index') }}">
    <button type="button" class="main-btn dark-btn btn-hover btn-xs" style="margin-top:28px">Reset</button>
   </a>
  </div>    
</div>    
</form>
</div>  
  
</div>
    
<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th width="25"><div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1"></div></th>
<th><h6><a href="#">Timezone<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Country<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">State<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">City<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th class="text-center"><h6>Status</h6></th>    
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@php $class = '';
      $data = '';
@endphp

@foreach ($cities as $city)    

<tr>
<td>
<div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1" ></div>
</td>
<td><p> {{ $city->timezone->name }} </p></td>
<td><p> {{ $city->country->name }} </p></td>
<td><p>{{ $city->state->name }}</p></td>
<td><p>{{ $city->name }}</p></td>
<td class="text-center">
  @php if($city->active == '1'){
    $class = 'activelabel';
    $data = 'Active';
    }
    else{
    $class = 'inactivelabel';
    $data = 'Inactive';
    } @endphp
    <div class="{{ $class; }}">{{ $data }}</div>
</td>  
<td class="text-center"><a href="{{ route('cities.edit',$city->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('cities.show',$city->id) }}"><i class="lni lni-list"></i></a>
</td>

</tr>

@endforeach
<!-- end table row -->

 
</tbody>
</table>
<!-- end table -->
</div>
</div>
<div class="mt-30"> 
<div class="row">
<div class="col-sm-6">
<div class="total_records">Total Records: <span>{{ $cities->total() }}</span>   </div>
</div>

<div class="col-sm-6">
    <nav aria-label="Page navigation example" class="pagination_new">


<ul class="pagination">
    <!-- Previous Page Link -->
    @if ($cities->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&laquo;</span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $cities->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
    @endif

    <!-- Pagination Elements -->
    @php
        $start = max(1, $cities->currentPage() - 5);
        $end = min($start + 9, $cities->lastPage());
    @endphp

    @if($start > 1)
        <li class="page-item">
            <a class="page-link" href="{{ $cities->url(1) }}">1</a>
        </li>
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">...</span>
        </li>
    @endif

    @foreach ($cities->getUrlRange($start, $end) as $page => $url)
        <li class="page-item {{ $page == $cities->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
    @endforeach

    @if($end < $cities->lastPage())
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">...</span>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ $cities->url($cities->lastPage()) }}">{{ $cities->lastPage() }}</a>
        </li>
    @endif

    <!-- Next Page Link -->
    @if ($cities->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $cities->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-link" aria-hidden="true">&raquo;</span>
        </li>
    @endif
</ul>
    </nav>
</div>     
</div>  
</div>  
    <!--Add new section end here-->
	</div>
</section>	
@endsection

<script>
    $(document).ready(function () {
        $('#search_name').on('input', function () {
            // Clear previous suggestions
            $('#suggestions').empty();

            // Get the input value
            var searchName = $(this).val();

            // Make an AJAX request to get suggestions
            if (searchName.length >= 3) {
                $.ajax({
                    url: '/your-suggestions-endpoint', // Replace with your actual endpoint
                    method: 'GET',
                    data: { search_name: searchName },
                    success: function (data) {
                        // Display suggestions
                        $.each(data, function (index, suggestion) {
                            $('#suggestions').append('<div>' + suggestion.name + '</div>');
                        });
                    }
                });
            }
        });

    });
</script>
