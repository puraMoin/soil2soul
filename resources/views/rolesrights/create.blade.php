@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('roles-rights.store') }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @csrf

       <!-- Row 1 -->
       <div class="row mt-15">   
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Role Name<span class="mandatory">*</span></label>
            <input type="text"  name="role_name" placeholder="Role Name"  />
            </div>   
         </div>
        <!-- Menulink Name -->
         <div class="col-sm-4">
            <div class="select-style-1">
               <label>MenuLinks</label>
              <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="menuLinks[]" multiple="true" required>
                  <option value="">Select</option>          
                    
                   @foreach ($menuLinks as $menuLink)

                     <option value="{{ $menuLink->id }}">{{ $menuLink->title }}</option>
  
                    @endforeach
                    
               </select>
               </div>
            </div>
         </div>
         <!-- Active Code --> 
         <div class="col-sm-4"> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" checked> No
            </label>
         </div>

         <div class="col-sm-12">
            <div class="input-style-1">
            <label>Role Description<span class="mandatory">*</span></label>
            <textarea rows="5" name="role_description" placeholder="Role Description"></textarea>
            </div>   
         </div>
      </div> 

      <div class="row mt-15">
       <div class="col-sm-3">  
        <button type="submit" class="main-btn primary-btn btn-hover btn-sm">Save</button>
        <button type="reset" class="main-btn primary-btn-outline btn-hover btn-sm">Reset</button>
        </div>
      </div>  

	</div>
</form>
</section>	
@endsection



