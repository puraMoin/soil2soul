@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogauthors.update', ['blogauthor' => $blogauthor->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
        
     <div class="row mt-15">
      <input type="hidden"  name="id" value="{{ $blogauthor->id }}"  />
         <!-- Author Name -->
        <div class="col-sm-4">
            <div class="input-style-1">
            <label>Author Name<span class="mandatory">*</span></label>
            <input type="text"  name="author_name" placeholder="Enter Author Name" required="true" value="{{ $blogauthor->author_name }}" />
            </div>   
        </div> 
         <!-- Image -->
         <div class="col-sm-3">
           <label>Image</label>
            <div id="imageBox">
           <img id="selectedIcon" src="{{  $blogauthor->author_image ? asset('images/blog_author/author_image/' . $blogauthor->id . '/' .  $blogauthor->author_image) : asset('images/no-image.png') }}" alt="Selected Image">
           </div>
           <input type="file" name="image" id="imageInput" onchange="displayIcon(this)" > 
            <span id="iconImage">{{ $blogauthor->author_image }}</span>
          </div> 
        <!-- Active Code --> 
        <div class="col-sm-3">
            <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $blogauthor->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $blogauthor->active == 0 ? 'checked' : '' }}> No
            </label>
        </div>
       </div>
    <div class="row mt-15">
    <div class="col-sm-12">
          <div class="input-style-1">
            <label>Note<span class="mandatory">*</span></label>
            <textarea rows="5" name="note" placeholder="Enter Note">{{ $blogauthor->note }}</textarea>
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

