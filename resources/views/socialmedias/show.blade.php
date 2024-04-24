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
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $socialmedia->name }}</p>
                        </td>
                    </tr> 
                   <tr>
                        <th class='col-md-2'><h6>Link</h6></th>
                        <td class=''>
                            <p>{{ $socialmedia->link }}</p>
                        </td>
                    </tr> 
                  <tr>
                      <th><h6>Icon Image</h6></th>
                       <td>
                          <p>
                             
                            @php
                                $firstImage = $socialmedia->image_icon;
                                $id = $socialmedia->id;
                                $imagePath = $firstImage ? asset("images/socialmedias/image_icon/{$id}/{$firstImage}") : null;
                            @endphp

                            @if(!empty($imagePath))
                                <img src="{{ $imagePath }}" height="30px">
                            @endif
                             
                           </p>
                       </td>
                    </tr>
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($socialmedia->active == '1'){
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
                           <p>{{ $socialmedia->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $socialmedia->updated_at }}</p>
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

