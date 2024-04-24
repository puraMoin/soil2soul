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
        <a href="{{ route('menulink.edit',['id' => $menulink->id]) }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs"><i class="lni lni-pencil-alt"></i> Update </button></a>
     </div>
	</div>
   <div class="container-fluid">
      <div class="card-style mt-20">
         <div class="table-wrapper table-responsive mt-10">
            <table class="table striped-table">
               <tbody>
                  <tr>
                  <th class="col-sm-2"><h6>Parent</h6></th>
                  <td>
                     <p>
                         @if($menulink->parent)
                            {{ $menulink->parent->title }} <!-- Replace 'name' with your actual parent field name -->
                        @else
                            ---
                        @endif
                     </p>
                  </td>
               </tr>   
               <tr>
                  <th><h6>Title</h6></th>
                  <td><p><?php echo $menulink->title; ?></p></td>
               </tr>
               <tr>
                  <th><h6>Link</h6></th> 
                   <td>
                     @php
                         $routeKey = $menulink->link;
                         $url = ($routeKey != '#') ? route($routeKey) : '';
                     @endphp
                     <p> <a href="{{ $url }}" target="_blank">Link</a></p>
                  </td>
               </tr>
               <tr>
                  <th class=""><h6>Active</h6></th> 
                   @php
                      $active = $menulink->active;
                      $class = ($active == 1) ? 'activelabel' : 'inactivelabel';
                      $activeText = ($active == 1) ? 'Active' : 'Inactive';
                  @endphp
                  <td class=""><div class="{{ $class }}">{{ $activeText }}</div></td> 
               </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>	
@endsection