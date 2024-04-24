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
                  <th><h6>Title</h6></th>
                  <th><h6>Parent</h6></th>
                  <th><h6>Link</h6></th> 
                  <th class="text-center"><h6>Active</h6></th> 
                  <th class="text-center"><h6>Action</h6></th> 
               </tr>
               </thead>
               <tbody>
                   @foreach($menulinks[null] ?? [] as $menulink)
                   <tr>
                      <td>
                         <table class="table">
                           <tbody>
                            <tr><td> <p><?php echo $menulink->order; ?></p></td></tr>
                            @foreach($menulinks[$menulink->id] ?? [] as $child)
                              <tr>
                                <td><p><?php echo '->'.$child->order; ?></p></td>
                              </tr>
                             @endforeach  
                           </tbody>
                         </table>
                      </td>
                      <!-- Title -->
                       <td>
                         <table class="table">
                           <tbody>
                            <tr>
                              <td> 
                                <p><?php echo $menulink->title; ?></p>
                               </td>
                            </tr>
                            @foreach($menulinks[$menulink->id] ?? [] as $child)
                              <tr>
                                <td><p><?php echo $child->title; ?></p></td>
                              </tr>
                             @endforeach  
                           </tbody>
                         </table>
                      </td>
                      <!-- Parent -->
                      <td>
                         <table class="table">
                           <tbody>
                            <tr>
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
                            @foreach($menulinks[$menulink->id] ?? [] as $child)
                              <tr>
                                <td><p><?php echo $child->parent->title; ?></p></td>
                              </tr>
                             @endforeach  
                           </tbody>
                         </table>
                      </td>
                      <!-- Link -->
                      <td>
                         <table class="table">
                           <tbody>
                            <tr>
                              <td> 
                                  @php
                                      $routeKey = $menulink->link;
                                      $url = ($routeKey != '#') ? route($routeKey) : '';
                                  @endphp
                                  <p> <a href="{{ $url }}" target="_blank">Link</a></p>
                               </td>
                            </tr>
                             @foreach($menulinks[$menulink->id] ?? [] as $child)
                              <tr>
                                <td>
                                     @php
                                      $routeKey1 = $child->link;
                                      $url1 = ($routeKey1 != '#') ? route($routeKey1) : '';
                                  @endphp
                                  <p> <a href="{{ $url1 }}" target="_blank">Link</a></p>
                                </td>
                              </tr>
                             @endforeach  
                           </tbody>
                         </table>
                      </td>
                      <!-- Active -->
                        <td class="text-center">
                         <table class="table">
                           <tbody>
                            <tr>
                              <td class="text-center"> 
                                   @php
                                       $active = $menulink->active;
                                       $class = ($active == 1) ? 'activelabel' : 'inactivelabel';
                                       $activeText = ($active == 1) ? 'Active' : 'Inactive';
                                   @endphp
                                   <div class="{{ $class }}">{{ $activeText }}</div>
                               </td>
                            </tr>
                             @foreach($menulinks[$menulink->id] ?? [] as $child)
                              <tr>
                                <td class="text-center">
                                     @php
                                       $activeChild = $child->active;
                                       $classChild = ($activeChild == 1) ? 'activelabel' : 'inactivelabel';
                                       $activeTextChild = ($activeChild == 1) ? 'Active' : 'Inactive';
                                   @endphp
                                  <div class="{{ $classChild }}">{{ $activeTextChild }}</div>
                                </td>
                              </tr>
                             @endforeach  
                           </tbody>
                         </table>
                      </td>
                      <!-- Action -->
                      <td class="text-center">
                         <table class="table">
                           <tbody>
                            <tr>
                              <td class="text-center"> 
                                 <a href="{{ route('menulink.edit',['id' => $menulink->id]) }}" title="Update"><i class="lni lni-pencil-alt"></i></a>
                                 <a href="{{ route('menulink.view',['id' => $menulink->id]) }}" title="View"><i class="lni lni-menu"></i></a>
                               </td>
                            </tr>
                             @foreach($menulinks[$menulink->id] ?? [] as $child)
                              <tr>
                                <td class="text-center">
                                    <a href="{{ route('menulink.edit',['id' => $child->id]) }}" title="Update"><i class="lni lni-pencil-alt"></i></a>
                                 <a href="{{ route('menulink.view',['id' => $child->id]) }}" title="View"><i class="lni lni-menu"></i></a>
                                </td>
                              </tr>
                             @endforeach  
                           </tbody>
                         </table>
                      </td>
                   </tr>
                   @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <!-- Pagination Start Here -->
@include('partials.pagination', ['items' => $menuItems])
<!-- Pagination End here -->
   </div>
</section>	
@endsection


 