@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->
     <div class="right-mob-left">
        <!-- <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button>  -->
        <a href="{{ route('blogcategories.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
	</div>

   <div class="container-fluid">
      <div class="card-style mt-20">
         <!-- <div class="create_update">Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
         <!-- Search Panel -->
         <div class="row"></div>
         <div class="table-wrapper table-responsive mt-10">
            <table class="table striped-table">
               <thead>
               <tr>
                  <th class=""><h6>Name</h6></th>  
                  <th class="text-center"><h6>Active</h6></th> 
                  <th class="text-center"><h6>Action</h6></th> 
               </tr>
               </thead>
               <tbody>
                @php $class = '';
                      $data = '';
                @endphp


                @foreach ($blogcategory as $blogcategory) 
                <tr>  
                  <td><p> {{ $blogcategory->name }} </p></td>
                  <td class="text-center"> 
                      @php if($blogcategory->active == '1'){
                            $class = 'activelabel';
                            $data = 'Active';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'Inactive';
                            } @endphp
                   <div class="{{ $class; }}">{{ $data }}</div>         
                   </td>
                  <td class="text-center"><a href="{{ route('blogcategories.edit',$blogcategory->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('blogcategories.show',$blogcategory->id) }}"><i class="lni lni-list"></i></a>
                  </td>

                 </tr> 
                 @endforeach
               </tbody> 
            </table>
         </div>
      </div>
   </div>
</section>	
@endsection