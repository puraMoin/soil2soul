@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')
     <!-- ========== Middle Content-wrapper start ========== -->    
     <!-- Add New Button -->

    <!-- For Start Here -->
   <form method="POST" action="{{ route('cities.update', ['city' => $city->id]) }}" enctype="multipart/form-data">  
  <div class="card-style mt-20">
      <!-- <div class="create_update">Created: <span>Andria Dsouza On 09/05/2023</span>   |   Last updated: <span>Andria Dsouza On 09/05/2023</span></div> -->
      <!-- Form Start Here -->
       @method('PUT')
       @csrf
      <div class="row mt-15">
          <!-- Id -->  
         <input type="hidden" name="id" value="{{ $city->id }}"  />
         <!-- Country -->
         <div class="col-sm-4">
            <div class="select-style-1">
               <label>Country</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="country_id" required>
                  <option value="{{ $country->id }}">{{ $country->name }}</option>                       
                   @foreach ($countries as $country)
                     <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach           
               </select>
               </div>
            </div>
         </div>
         <!--State-->
          <div class="col-sm-4">
            <div class="select-style-1">
               <label>State</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="stateDropdown" name="state_id" required>
                    <option value="{{ $state->id }}">{{ $state->name }}</option> 
                    @foreach ($states as $state)
                     <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach              
               </select>
               </div>
            </div>
         </div>
        <!-- TimeZone -->
         <div class="col-sm-4">
            <div class="select-style-1">
               <label>Timezone</label>
               <div class="select-position select-sm">
               <select class="jSelectbox" id="actionDropdown" name="timezone_id" required>
                <option value="{{ $timezone->id }}">{{ $timezone->name }}</option> 
                    @foreach ($timezones as $timezone)
                     <option value="{{ $timezone->id }}">{{ $timezone->name }}</option>
                    @endforeach        
               </select>
               </div>
            </div>
         </div>
          <!-- Name -->
         <div class="col-sm-4">
            <div class="input-style-1">
            <label>Name<span class="mandatory">*</span></label>
            <input type="text"  name="name" placeholder="State Name" value="{{ $city->name }}"  />
            </div>   
         </div>
         <!-- Active Code --> 
         <div class="col-sm-4">
             <label>Active</label><br> 
             <label class="radio-inline">
             <input type="radio" name="active" class="radio-inline" value="1" {{ $city->active == 1 ? 'checked' : '' }}> Yes
             </label>
            <label class="radio-inline">
            <input type="radio" name="active" class="radio-inline" value="0" {{ $city->active == 0 ? 'checked' : '' }}> No
            </label>
         </div>
      </div> 
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Change event for the country dropdown
        $('#actionDropdown').on('change', function () {
            var countryId = $(this).val();
            if (countryId) {
                // Make an AJAX request to get the states based on the selected country
                $.ajax({
                    type: 'GET',
                    url: 'http://localhost/project/Laravel/Etos2/public/get-states/' + countryId, // Replace with the actual route to get states
                    success: function (data) {
                        // Clear the current options in the state dropdown
                        $('#stateDropdown').empty();
                        // Add the defualt select box
                        $('#stateDropdown').append('<option value="">Select</option>');
                        // Add the new options based on the response
                        $.each(data, function (key, value) {

                            $('#stateDropdown').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
             } else {
                // If no country is selected, clear the state dropdown
                $('#stateDropdown').empty();
            }
        });
    });
</script>


