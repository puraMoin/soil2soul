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
   <form method="POST" action="{{ route('blogauthors.store') }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <!-- Author Name -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Author Name<span class="mandatory">*</span></label>
            <input type="text"  name="author_name" placeholder="Enter Author Name" required="true" />
            </div>   
        </div> 
         <!-- Image -->
        <div class="col-sm-4">
         <label>Image</label>
          <div id="imageBox">
         <img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="author_image" id="imageInput" onchange="displayImage(this)">
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
       </div>
    <div class="row mt-15">
    <div class="col-sm-12">
          <div class="input-style-1">
            <label>Note<span class="mandatory">*</span></label>
            <textarea rows="5" name="note" placeholder="Enter Note"></textarea>
            </div>   
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

