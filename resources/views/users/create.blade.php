@extends('layouts.app')

@section('content')
   <style>
        #imageBox {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
   </style>     
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <!-- Role -->
<!--         <div class="col-sm-3">
            <div class="select-style-1">
               <label>Role</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="role_id" required>
                  <option value="">Select</option>  
                      @foreach ($rolesRights as $rolesRight)
                     <option value="{{ $rolesRight->id }}">{{ $rolesRight->role_name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>  -->
        <!-- AdminType -->
        <div class="col-sm-4">
            <div class="select-style-1">
               <label>Admin Type</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="admin_type_id" required>
                  <option value="">Select</option>  
                      @foreach ($adminTypes as $adminType)
                     <option value="{{ $adminType->id }}">{{ $adminType->name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>
         <!-- Email/Username -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Email/UserName<span class="mandatory">*</span></label>
            <input type="email"  name="email" placeholder="Enter Your Email" required="true" />
            </div>   
        </div> 
         <!-- Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Password<span class="mandatory">*</span></label>
            <input type="password"  name="password" placeholder="Enter Your Password" required="true" />
            </div>   
         </div>
       <div class="row mt-15">
         <!-- Email --> 
         <!-- Name -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Enter Your User Name" required="true" />
            </div>   
         </div>

          <!-- Contact --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Contact<span class="mandatory">*</span></label>
            <input type="text"  name="contact_no" placeholder="Enter Your Contact" class="numeric" required="true" />
            </div>   
         </div>
         <!-- Alternate No --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Alternate No<span class="mandatory">*</span></label>
            <input type="text"  name="alternate_no" placeholder="Enter Alternate No" class="numeric" required="true" />
            </div>   
         </div>
         <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" checked> No
            </label>
         </div>
       </div>
    <div class="row mt-15">
               
                 <!-- Image -->
        <div class="col-sm-3">
         <label>Image</label>
          <div id="imageBox">
         <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="image" id="imageInput" onchange="displayImage(this)">
        </div> 

        <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Its Seo Users</label><br> 
             <label class="radio-inline">
             <input type="radio" name="its_seo_users" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="its_seo_users" class="radio-inline" value="0" checked> No
            </label>
         </div>

         <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Its Report Manager</label><br> 
             <label class="radio-inline">
             <input type="radio" name="its_report_manager" class="radio-inline" value="1"> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="its_report_manager" class="radio-inline" value="0" checked> No
            </label>
         </div>

    </div>   
      </div> 
      <div class="row mt-15">
       <div class="col-sm-3">  
        <button class="btn btn-info" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        </div>
      </div>  

	</div>
</form>
</section>	
@endsection
<script>
    function displayImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('selectedImage').setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

