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
                        <th class='col-md-2'><h6>Role Name</h6></th>
                        <td class=''>
                            <p>{{ $role->role_name }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>Role Description</h6></th>
                        <td class=''>
                            <p>{{ $role->role_description }}</p>
                        </td>
                    </tr> 
                    <tr>
                    <tr>
                        <th class='col-md-2'><h6>Modules</h6></th>
                        <td class=''>
                        @foreach ($role->menuLinks as $menuLink)
                        <p>{{ $menuLink->title }}</p>
                        @endforeach
                        </td>
                    </tr>   
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($role->acive == '1'){
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
                           <p>{{ $role->created }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $role->modified }}</p>
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

