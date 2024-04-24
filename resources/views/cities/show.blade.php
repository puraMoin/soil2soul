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
                        <th class='col-md-2 hide'><h6>Id</h6></th>
                        <td class='hide'>
                            <p>{{ $city->id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Timezone</h6></th>
                        <td class=''>
                            <p>{{ $city->timezone->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $city->country->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>State</h6></th>
                        <td class=''>
                            <p>{{ $city->state->name }}</p>
                        </td>
                    </tr> 
                    <tr>
                        <th class='col-md-2'><h6>City</h6></th>
                        <td class=''>
                            <p>{{ $city->name }}</p>
                        </td>
                    </tr> 
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($city->active == '1'){
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
                           <p>{{ $city->created }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $city->modified }}</p>
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

