@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->
     <div class="right-mob-left">
        <!-- <button type="button" class="main-btn primary-btn-outline btn-hover btn-xs">Import</button>  -->
        <a href="{{ route('blogauthors.create') }}"><button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button></a></div>
	</div>

   <div class="container-fluid">
        @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
     @endif
      <div class="card-style mt-20">
         <!-- <div class="create_update">Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
         <!-- Search Panel -->
         <div class="row"></div>
         <div class="table-wrapper table-responsive mt-10">
            <table class="table striped-table">
               <thead>
               <tr>
                  <th class="col-sm-2"><h6>Image</h6></th>
                  <th class="col-sm-2"><h6>Author</h6></th>    
                  <th class="col-sm-4"><h6>Note</h6></th> 
                  <th class="col-sm-2 text-center"><h6>Active</h6></th> 
                  <th class="col-sm-2 text-center"><h6>Action</h6></th> 
               </tr>
               </thead>
               <tbody>
                @php $class = '';
                      $data = '';
                @endphp


                @foreach ($blogauthors as $blogauthor) 
                <tr>  
                <td><p> @php
                                $firstImage = $blogauthor->author_image;
                                $id = $blogauthor->id;
                                $imagePath = $firstImage ? asset("images/blog_author/author_image/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="70px">
                 @endif </p></td>
                  <td><p> {{ $blogauthor->author_name }} </p></td>

                  <td><p> {{ $blogauthor->note }} </p></td>
                  <td class="text-center"> 
                      @php if($blogauthor->active == '1'){
                            $class = 'activelabel';
                            $data = 'Active';
                            }
                            else{
                            $class = 'inactivelabel';
                            $data = 'Inactive';
                            } @endphp
                   <div class="{{ $class; }}">{{ $data }}</div>         
                   </td>
                  <td class="text-center"><a href="{{ route('blogauthors.edit',$blogauthor->id) }}"><i class="lni lni-pencil-alt"></i></a>
                  <a href="{{ route('blogauthors.show',$blogauthor->id) }}"><i class="lni lni-list"></i></a>
                  </td>

                 </tr> 
                 @endforeach
               </tbody> 
            </table>
         </div>
      </div>
   </div>
</section>	
@endsection