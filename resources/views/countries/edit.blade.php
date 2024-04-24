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
        #iconBox{
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #selectedImage {
            max-width: 100%;
            max-height: 100%;
        }
       #selectedIcon {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('update', ['id' => $countries->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <!-- Name -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Country Name" value="{{ $countries->name }}" required />
            </div>   
         </div>
         <!-- Alpha 2 Code -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Alpha 2 Code<span class="mandatory">*</span></label>
            <input type="text" maxlength="2"  name="alpha_2_code" placeholder="Alpha 2 Code" value="{{ $countries->alpha_2_code }}"  required />
            </div>   
         </div>
         <!-- Alpha 3 Code -->
         <div class="col-sm-3">
            <div class="input-style-1">
            <label>Alpha 3 Code</label>
            <input type="text" maxlength="3"  name="alpha_3_code" placeholder="Alpha 3 Code" value="{{ $countries->alpha_3_code }}" required />
            </div>   
         </div>
         <!-- Calling Code --> 
         <div class="col-sm-3">
            <div class="input-style-1">
            <label >Calling Code</label>
            <input type="text" maxlength="5"  name="calling_code" placeholder="Calling Code" value="{{ $countries->calling_code }}" required="" />
            </div>   
         </div>
      </div>
      <div class="row mt-15">
         <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $countries->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $countries->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
          <!-- Cover Image -->
        <div class="col-sm-3">
         <label>Cover Image</label>
          <div id="imageBox">
         <img id="selectedImage" src="{{ $countryDetails->cover_image ? asset('images/country_details/cover_image/' . $countryDetails->id . '/' . $countryDetails->cover_image) : asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="cover_image"  id="imageInput" onchange="displayImage(this)"  >
         <span id="coverImage">{{ $countryDetails->cover_image }}</span>
        </div> 
                <!-- Icon Image -->
       <div class="col-sm-3">
         <label>Icon Image</label>
          <div id="iconBox">
         <img id="selectedIcon" src="{{ $countryDetails->icon_image ? asset('images/country_details/icon_image/' . $countryDetails->id . '/' . $countryDetails->icon_image) : asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="icon_image" id="imageInput" onchange="displayIcon(this)" > 
          <span id="iconImage">{{ $countryDetails->icon_image }}</span>
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


