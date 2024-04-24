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
        <a href="{{ route('menulink.add') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
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
                  <th><h6>Order</h6></th>
                  <th><h6>Parent</h6></th>
                  <th><h6>Title</h6></th>
                  <th><h6>Link</h6></th> 
                  <th class="text-center"><h6>Active</h6></th> 
                  <th class="text-center"><h6>Action</h6></th> 
               </tr>
               </thead>
               <tbody>
                   @foreach($menulinks as $menulink)
                  <tr>
                    <td><p><?php echo $menulink->order; ?></p></td>
                     <!-- <td><p><?php echo (!empty($menulink->parent_id)) ? '' : '---'; ?></p></td> -->
                     <td>
                        <p>
                            @if($menulink->parent)
                               {{ $menulink->parent->title }} <!-- Replace 'name' with your actual parent field name -->
                           @else
                               ---
                           @endif
                        </p>
                     </td>
                     <td><p><?php echo $menulink->title; ?></p></td>
                     <td>
                        @php
                            $routeKey = $menulink->link;
                            $url = ($routeKey != '#') ? route($routeKey) : '';
                        @endphp
                        <p> <a href="{{ $url }}" target="_blank">Link</a></p>
                     </td>
                     <!-- Active | Inactive -->
                      @php
                         $active = $menulink->active;
                         $class = ($active == 1) ? 'activelabel' : 'inactivelabel';
                         $activeText = ($active == 1) ? 'Active' : 'Inactive';
                     @endphp
                     <td class="text-center"><div class="{{ $class }}">{{ $activeText }}</div></td> 
                     <!-- Action -->
                     <td class="text-center">
                        <a href="{{ route('menulink.edit',['id' => $menulink->id]) }}" title="Update"><i class="lni lni-pencil-alt"></i></a>
                        <a href="{{ route('menulink.view',['id' => $menulink->id]) }}" title="View"><i class="lni lni-menu"></i></a>
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