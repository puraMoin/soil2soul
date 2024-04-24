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
   <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden"  name="id" value="{{ $user->id }}"  />

         <!-- AdminType -->
        <div class="col-sm-3">
            <div class="select-style-1">
               <label>Admin Type</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="admin_type_id" required>
                  <option value="{{ $adminType->id }}">{{ $adminType->name }}</option>  
                      @foreach ($adminTypes as $adminType)
                     <option value="{{ $adminType->id }}">{{ $adminType->name }}</option>
                      @endforeach
               </select>
               </div>
            </div>
         </div>
          <!-- Name -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Enter Your User Name" required="true" 
            value="{{ $user->name }}" />
            </div>   
         </div>
                   <!-- Contact --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Contact<span class="mandatory">*</span></label>
            <input type="text"  name="contact_no" placeholder="Enter Your Contact" class="numeric" required="true"  value="{{ $user->contact_no }}" />
            </div>   
         </div>
         <!-- Alternate No --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Alternate No<span class="mandatory">*</span></label>
            <input type="text"  name="alternate_no" placeholder="Enter Alternate No" class="numeric" required="true" value="{{ $user->alternate_no }}" />
            </div>   
         </div>
         <!-- Password -->
<!--          <div class="col-sm-3">
            <div class="input-style-1">
            <label>Password<span class="mandatory">*</span></label>
            <input type="password"  name="password" placeholder="Enter Your Password" required="true" 
             value="{{ $user->password }}" />
            </div>   
         </div> -->
        </div> 
       <div class="row mt-15">
         <!-- Email --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Email/UserName<span class="mandatory">*</span></label>
            <input type="email"  name="email" placeholder="Enter Your Email" required="true" 
             value="{{ $user->email }}"/>
            </div>   
         </div>

         <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $user->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $user->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>

                 <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Its Seo Users</label><br> 
             <label class="radio-inline">
             <input type="radio" name="its_seo_users" class="radio-inline" value="1" {{ $user->its_seo_users == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="its_seo_users" class="radio-inline" value="0" {{ $user->its_seo_users == 0 ? 'checked' : '' }}> No
            </label>
         </div>

         <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Its Reporting Manager</label><br> 
             <label class="radio-inline">
             <input type="radio" name="its_report_manager" class="radio-inline" value="1" {{ $user->its_report_manager == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="its_report_manager" class="radio-inline" value="0"  {{ $user->its_report_manager == 0 ? 'checked' : '' }}> No
            </label>
         </div>

       </div>
    <div class="row mt-15">
               
    <!--  Image -->
       <div class="col-sm-3">
         <label>Image</label>
          <div id="imageBox">
         <img id="selectedIcon" src="{{ $user->image ? asset('images/users/image/' . $user->id . '/' . $user->image) : asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="image" id="imageInput" onchange="displayIcon(this)" > 
          <span id="iconImage">{{ $user->image }}</span>
        </div> 

    <!-- Active Code --> 
    <div class="col-sm-4">
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $role->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $role->active == 0 ? 'checked' : '' }}> No
            </label>
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
    function displayIcon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#selectedIcon').attr('src', e.target.result);
                $('#iconImage').text(input.files[0].name);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>