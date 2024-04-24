@extends('layouts.app')

@section('content')  
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">  
   <div class="card-style mt-20">
      <!-- Form Start Here -->
       @csrf
      <div class="row mt-15">
         <!-- Blog Date -->
         <div  class="col-sm-3">
            <div class="input-style-1">
            <label>Date <span class="mandatory">*</span></label>
            <!-- <input type="text" name="Date" class="date" placeholder="Date"  /> -->
             <input type="text" name="blog_date" id="datepicker" class="date">
            </div>   
         </div>
         <!-- Categories -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label>Category <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="blog_category_id" required>
                <option value="">Select Category</option>  
                 <?php 
                    foreach ($blogCategoryList as $blogCategoryId => $blogCategory){
                     
                 ?>  
                   <option value="{{ $blogCategoryId }}" >{{ $blogCategory }}</option>
                 <?php } ?>   
             </select>
             </div>
            </div>   
         </div>
         <!-- Blog Author -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label>Authors <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="blog_author_id" required>
                <option value="">Select Author</option>  
                 <?php 
                    foreach ($blogAuthorList as $blogAuthorId => $blogAuthor){
                     
                 ?>  
                   <option value="{{ $blogAuthorId }}" >{{ $blogAuthor }}</option>
                 <?php } ?>   
             </select>
             </div>
            </div>   
         </div>
          <!-- Blog Author -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label>Tags</label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="blogtags[]" multiple="true">
                <option value="">Select Blog</option>  
                 <?php 
                    foreach ($blogTagList as $blogTagId => $blogTag){
                     
                 ?>  
                   <option value="{{ $blogTagId }}" >{{ $blogTag }}</option>
                 <?php } ?>   
             </select>
             </div>
            </div>   
         </div>
      </div>  
      <hr>
      <div class="row mt-15">
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Title <span class="mandatory">*</span></label>
            <input type="text"  name="title" placeholder="Title"  required/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Slug <span class="mandatory">*</span></label>
            <input type="text"  name="page_slug" placeholder="Page Slug"  required/>
            </div>   
         </div>
          <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Title</label>
            <input type="text"  name="page_title" placeholder="Page Title"/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="url"  name="page_url" placeholder="Page URL"  readonly/>
            </div>   
         </div>
      </div>
      <hr>
     <div class="row mt-15">
        <div class="col-sm-12">
            <div class="input-style-1">
               <label>Header Text <span class="mandatory">*</span></label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="header_text" rows="3"></textarea>
            </div>   
         </div>
     </div>
     <hr>
     <div class="row mt-15">
         <div class="col-sm-4">
            <label>Image</label>
             <div id="bannerBox"><img id="selectedImage" src="{{ asset('images/no-image.png') }}" alt="Selected Image"></div>
             <input type="file" name="image_file" id="imgupload" onchange="displayImage(this)">
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
     <hr>
     <div class="row mt-15">
        <div class="col-sm-12">
           <div class="input-style-1">
               <label>Description</label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="description" rows="10" class="rich-editor"></textarea>
            </div>  
        </div>
     </div>
     <hr>
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

