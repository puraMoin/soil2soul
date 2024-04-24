@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('blogcategories.update', ['blogcategory' => $blogcategory->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden"  name="id" value="{{ $blogcategory->id }}"  />

         <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="Enter Name" required="true" value="{{ $blogcategory->name  }}" />
            </div>   
         </div>

          <!-- Page Title --> 
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Title<span class="mandatory">*</span></label>
            <input type="text"  name="page_title" placeholder="Enter Page Title" required="true" value="{{ $blogcategory->page_title  }}" />
            </div>   
         </div>

         <!-- Active Code -->
         <div class="col-sm-3">   
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $blogcategory->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $blogcategory->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
      </div>   

<div class="row mt-15">
            <!-- Page Slug -->
     <div class="col-sm-4">
            <div class="input-style-1">
            <label>Page Slug<span class="mandatory">*</span></label>
            <input type="text"  name="page_slug" placeholder="Enter Page Slug" required="true" value="{{ $blogcategory->page_slug  }}"/>
            </div>   
     </div>
       
    <!-- Page Url -->
     <div class="col-sm-8">
            <div class="input-style-1">
            <label>Page Url<span class="mandatory">*</span></label>
            <input type="text"  name="page_url" placeholder="Page Url" required="true" value="{{ $blogcategory->page_url  }}" />
            </div>   
     </div>  

     <!-- Meta Description -->
     <div class="col-sm-12">
            <div class="input-style-1">
            <label>Meta Description<span class="mandatory">*</span></label>
            <textarea rows="5" name="meta_description" placeholder="Meta Description">{{ $blogcategory->meta_description  }}  </textarea>
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

