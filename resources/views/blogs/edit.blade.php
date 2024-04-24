@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogs.update', ['blog' => $blog->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden" name="id" value="{{ $blog->id }}"  />

          
        <div class="row mt-15"> 
           <!-- Blog Date -->
           <div  class="col-sm-3">
              <div class="input-style-1">
              <label>Date <span class="mandatory">*</span></label>
              <!-- <input type="text" name="Date" class="date" placeholder="Date"  /> -->
              <input type="text" name="blog_date" id="datepicker" class="date" value="{{ $blog->blog_date }}">
              </div>   
           </div>
          <!-- Categories -->
         <div  class="col-sm-3">
            <div class="select-style-1">
            <label>Category <span class="mandatory"> *</span></label>
            <div class="select-position select-sm">
             <select class="jSelectbox" id="actionDropdown" name="blog_category_id" required>
                <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option> 
                  @foreach ($blogCategories as $blogCategory)
                     <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
                  @endforeach  
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
                <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}</option>  
                  @foreach ($blogAuthors as $blogAuthor)
                     <option value="{{ $blogAuthor->id }}">{{ $blogAuthor->author_name }}</option>
                  @endforeach   
             </select>
             </div>
            </div>   
         </div>
        <!-- Blog Tags --> 
              <div class="col-sm-3">
                  <div class="select-style-1">
                      <label>Blog Tags</label>
                      <div class="select-position select-sm">
                          <select class="jSelectbox" id="actionDropdown" name="blogtags[]" multiple="true" required>
                              @foreach ($blogtags as $blogtag)
                                  <option value="{{ $blogtag->id }}" {{ in_array($blogtag->id, $selectedBlogTags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                      {{ $blogtag->name }}
                                  </option>
                              @endforeach
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
            <input type="text"  name="title" placeholder="Title" value="{{ $blog->title }}"  required/>
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Slug <span class="mandatory">*</span></label>
            <input type="text"  name="page_slug" placeholder="Page Slug" value="{{ $blog->page_slug }}"   required/>
            </div>   
         </div>
          <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Title</label>
            <input type="text"  name="page_title" placeholder="Page Title" value="{{ $blog->page_title }}" />
            </div>   
         </div>
         <div class="col-sm-6">
            <div class="input-style-1">
            <label>Page Url</label>
            <input type="url"  name="page_url" placeholder="Page URL" value="{{ $blog->page_url }}"  readonly/>
            </div>   
         </div>
      </div> 
      <hr>
      <div class="row mt-15">
        <div class="col-sm-12">
            <div class="input-style-1">
               <label>Header Text <span class="mandatory">*</span></label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="header_text" rows="3"> {{ $blog->header_text }} </textarea>
            </div>   
         </div>
     </div>
     <hr>
     <div class="row mt-15">           
      <!--  Image -->
       <div class="col-sm-4">
         <label>Image</label>
          <div id="bannerBox">
         <img id="selectedImage" src="{{ $blog->image_file ? asset('images/blog/image_file/' . $blog->id . '/' . $blog->image_file) : asset('images/no-iblogmage.png') }}" alt="Selected Image">
         </div>
         <input type="file" name="image_file" id="imageInput" onchange="displayIcon(this)" > 
          <span id="iconImage">{{ $blog->image_file }}</span>
        </div> 
        <div class="col-sm-4">
             <!-- Active Code --> 
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $blog->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $blog->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
      </div> 
     <hr>
     <div class="row mt-15">
        <div class="col-sm-12">
           <div class="input-style-1">
               <label>Description</label>
               <!-- <input type="text"  name="header_text" placeholder="Header Text" /> -->
               <textarea name="description" rows="10" class="rich-editor"> {{ $blog->description }} 
               </textarea>
            </div>  
        </div>
     </div>
     <hr>
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



