@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')

     <div class="right-mob-left">
        <a href="{{ route('roles-rights.index') }}">
        <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button> 
        </a>
        <a href="{{ route('roles-rights.create') }}">
        <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
        </a>
    </div>
     
    <!--Add new section start here-->
<div class="card-style mt-20">
<div class="row">
<div class="col-sm-4">
<div class="searchfield">
<input type="text" placeholder="Search...">
<button><i class="lni lni-search-alt"></i></button>
</div>  
</div>
<div class="col-sm-4">
<div class="filtertext">
<ul>
<!-- <li>1 Selected</li> -->
<!--<li><a href="#"><i class="lni lni-pencil"></i> Edit</a></li>-->
<!-- <li><a href="#"><i class="lni lni-trash-can"></i> Delete</a></li> -->
</ul>   
</div>  
</div>  
<div class="col-sm-4 rowmargin10">
<div class="right-mob-left"><button type="button" class="main-btn dark-btn btn-hover btn-xs">Export</button></div>
</div>  
</div>
    
<div class="table-wrapper table-responsive mt-10">
<table class="table striped-table">
<thead>
<tr>
<th width="25"><div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1"></div></th>
<th><h6><a href="#">Role Name<i class="lni lni-sort-alpha-asc"></i></a></h6></th>
<th><h6><a href="#">Role Description<i class="lni lni-sort-alpha-asc"></i></a></h6></th> 
<th class="text-center"><h6>Status</h6></th>    
<th class="text-center"><h6>Action</h6></th>
</tr>
<!-- end table row-->
</thead>
<tbody>
@php $class = '';
      $data = '';
@endphp

@foreach ($roles as $role)    

<tr>
<td>
<div class="check-input-primary"><input class="form-check-input" type="checkbox" id="checkbox-1" ></div>
</td>
<td><p> {{ $role->role_name }} </p></td>
<td><p> {{ $role->role_description }} </p></td>

<td class="text-center">
  @php if($role->active == '1'){
    $class = 'activelabel';
    $data = 'Active';
    }
    else{
    $class = 'inactivelabel';
    $data = 'Inactive';
    } @endphp
    <div class="{{ $class; }}">{{ $data }}</div>
</td>  
<td class="text-center"><a href="{{ route('roles-rights.edit',$role->id) }}"><i class="lni lni-pencil-alt"></i></a>
<a href="{{ route('roles-rights.show',$role->id) }}"><i class="lni lni-list"></i></a>
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
<div class="total_records">Total Records: <span></span>   </div>
</div>

     
</div>  
</div>  
    <!--Add new section end here-->
	</div>
</section>	
@endsection

