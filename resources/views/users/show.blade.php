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
                        <th class='col-md-2'><h6>Role</h6></th>
                        <td class=''>
                            <p>{{ $user->roles->role_name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Admin Type</h6></th>
                        <td class=''>
                            <p>{{ $user->adminTypes->name }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $user->name }}</p>
                        </td>
                    </tr> 
                   <tr>
                        <th class='col-md-2'><h6>Email/UserName</h6></th>
                        <td class=''>
                            <p>{{ $user->email }}</p>
                        </td>
                    </tr> 
                   <tr>
                        <th class='col-md-2'><h6>Contact No</h6></th>
                        <td class=''>
                            <p>{{ $user->contact_no }}</p>
                        </td>
                    </tr> 
                   <tr>
                        <th class='col-md-2'><h6>Alternate No</h6></th>
                        <td class=''>
                            <p>{{ $user->alternate_no }}</p>
                        </td>
                    </tr>
                  <tr>
                      <th><h6>Icon Image</h6></th>
                       <td>
                          <p>
                             
                            @php
                                $firstImage = $user->image;
                                $id = $user->id;
                                $imagePath = $firstImage ? asset("images/users/image/{$id}/{$firstImage}") : null;
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
                      @php if($user->active == '1'){
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
                    <th><h6>Its Seo Users</h6></th>    
                    <td>
                      @php if($user->its_seo_users == '1'){
                        $class = 'activelabel';
                        $data = 'Yes';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'No';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                    </tr> 
                   <tr>
                    <th><h6>Its Reporting Manager</h6></th>    
                    <td>
                      @php if($user->its_report_manager == '1'){
                        $class = 'activelabel';
                        $data = 'Yes';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'No';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                    </tr> 
                    <tr>
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $user->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $user->updated_at }}</p>
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

