@extends('layouts.app')

@section('content')
 <!-- The Modal -->
  <div class="modal fade modal-lg" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Menu Links</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
             <div class="row mt-15">
                <div class="col-sm-6">
                  <div class="select-style-1">
                     <label>Controller</label>
                     <div class="select-position select-sm">
                     <select class="jSelectbox" id="controllerDropdown" name="controoler">
                       <option value="">Select Controller</option> 
                     @foreach ($controllers as $controller)
                         <option value="{{ $controller }}">{{ $controller }}</option>
                     @endforeach
                     </select>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="select-style-1">
                     <label>Action</label>
                     <div class="select-position select-sm">
                     <select class="jSelectbox" id="methods" name="action">
                        <option value="">Select Action</option>  
                     </select>
                     </div>
                  </div>
               </div>
             </div>  
        </div>
      
      </div>
    </div>
  </div>
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->
     <div class="row">
      <div class="col-sm-5">
         <div class="title rowmargindesk10"><h4>Add New {{$pageTitle}} </h4></div> 
      </div>  
    </div>
    <!-- For Start Here -->
    <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
      <form method="POST" action="{{ route('menulink.store') }}">
       @csrf   
      <div class="row mt-15">
         <!-- Parent Id -->
         <div class="col-sm-3">
            <div class="select-style-1">
               <label>Parent</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" name="parent_id">
                  <option value="">Root</option>
                  <?php if(!empty($parentMenuLinks)){ 
                     foreach ($parentMenuLinks as $key => $parentMenuLink) { ?>
                     <option value="<?php echo $parentMenuLink->id; ?>"><?php echo $parentMenuLink->title; ?></option>
                     <?php } ?>
                  <?php } ?>    
               </select>
               </div>
            </div>
         </div>
         <!-- Title -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Title<span class="mandatory">*</span></label>
            <input type="text"  name="title" placeholder="Menu Title" required>
            </div>   
         </div>
         <!-- Link -->
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Link <span class="mandatory">*</span></label>
            <div class="input-group">
            <input type="text" placeholder="" name='link' id="menuLinkUrl" class="form-control" required>
             <div class="input-group-append">
                <button class="btn btn-outline-secondary addAppendBtn" type="button">
                  <i class="fa fa-plus"></i> <!-- Font Awesome plus icon -->
                </button>
             </div>
            </div>
           </div>
         </div> 
      </div>
      <div class="row mt-15">
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Display Order<span class="mandatory">*</span></label>
            <input type="number"  name="order" placeholder="Display Order" required>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="textblack13">Status Information</div>  
            <div class="row mt-15">
            <div class="col-3">
            <div class="form-check generallabel mb-20">
            <input class="form-check-input" type="radio" name="active" value="1" id="radio-1">
            <label class="form-check-label" for="radio-1">Active</label>
            </div>   
            </div>
            <div class="col-9">
            <div class="form-check generallabel mb-20">
            <input class="form-check-input" type="radio"  name="active" value="0" id="radio-2" checked>
            <label class="form-check-label" for="radio-2">Inactive</label>
            </div>   
            </div>   
            </div>   
         </div>
      </div>
      <div class="row mt-15">
         <div class="mt-20"><button type="submit" class="main-btn primary-btn btn-hover btn-sm">Submit</button></div>
      </div>
      </form>
    </div>
	</div>
</section>	
@endsection

