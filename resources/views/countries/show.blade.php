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
                            <p>{{ $country->id }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th class='col-md-2'><h6>Country</h6></th>
                        <td class=''>
                            <p>{{ $country->name }}</p>
                        </td>
                    </tr>
                    <tr>
                       <th><h6>Alpha 2 Code </h6></th>
                       <td>
                           <p>{{ $country->alpha_2_code }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Alpha 3 Code </h6></th>
                       <td>
                          <p>{{ $country->alpha_3_code }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Calling Code</h6></th>
                       <td>
                          <p>{{ $country->calling_code }}</p>
                       </td>
                    </tr>
                    <tr>
                      <th><h6>Icon Image</h6></th>
                       <td>
                          <p>
                             @if ($country->countryDetails->isNotEmpty())
                             @php
                                $firstImage = $country->countryDetails->first()->icon_image;

                                $id = $country->countryDetails->first()->id;

                                $imagePath = $firstImage ? asset("images/country_details/icon_image/{$id}/{$firstImage}") : null;
                              

                            @endphp
                            @if(!empty($imagePath))
                            <img src="{{ $imagePath }}" height="30px">
                             @endif
                            @endif  
                           </p>
                       </td>
                    </tr>
                    <tr>
                    <th><h6>Cover Image</h6></th>   
                    <td><p>
                    @if ($country->countryDetails->isNotEmpty())
                    @php
                      $coverImage = $country->countryDetails->first()->cover_image;

                      $id = $country->countryDetails->first()->id;

                        $imagePath = $coverImage ? asset("images/country_details/cover_image/{$id}/{$coverImage}") : null;
          

                            @endphp
                            @if(!empty($imagePath))
                            <img src="{{ $imagePath }}" height="50px">
                             @endif
                            @endif  
                    </p></td> 
                    </tr> 
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($country->active == '1'){
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
                           <p>{{ $country->created }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $country->modified }}</p>
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

