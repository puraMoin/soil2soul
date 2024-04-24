@extends('layouts.app')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')


     
    <!--Add new section start here-->
<div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                    <tr>
                        <th class='col-md-2'><h6>Author Name</h6></th>
                        <td class=''>
                            <p>{{ $blogauthor->author_name }}</p>
                        </td>
                    </tr> 
                   <tr>
                        <th class='col-md-2'><h6>Image</h6></th>
                        <td class=''>
                            <p>@php
                                $firstImage = $blogauthor->author_image;
                                $id = $blogauthor->id;
                                $imagePath = $firstImage ? asset("images/blog_author/author_image/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="40px">
                 @endif</p>
                        </td>
                    </tr> 
                   <tr>
                        <th class='col-md-2'><h6>Note</h6></th>
                        <td class=''>
                            <p>{{ $blogauthor->note }}</p>
                        </td>
                   </tr> 
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
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
                    </tr> 
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $blogauthor->created }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $blogauthor->modified }}</p>
                       </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    

</div>


    <!--Add new section end here-->
	</div>
</section>	
@endsection

