@extends('layouts.app')

@section('content')
     
<section class="section">
  <div class="container-fluid">
     <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('users.update-password') }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15"> 
         <!-- Old Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Old Password<span class="mandatory">*</span></label>
            <input type="password"  name="password" placeholder="Enter Old Password" required="true" />

            </div>   
         </div>
         <!-- Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>New Password<span class="mandatory">*</span></label>
            <input type="password"  name="new_password" placeholder="Enter New Password" required="true" />

            </div>   
         </div>

         <!-- Confirm Password -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Confirm Password<span class="mandatory">*</span></label>
            <input type="password"  name="confirm_password" placeholder="Enter Confirm Password" required="true" />

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


