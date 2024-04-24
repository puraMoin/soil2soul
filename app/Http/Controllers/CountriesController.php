<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\CountryDetail;
use Illuminate\Support\Facades\DB; 

class CountriesController extends Controller
{
    public function index(Request $request)
    {

        $pageTitle = 'Countries';
        $parentMenu = 'Segment & Currency Setup';
       
        // Eager load the related CountryDetail model
        /*$countries = Countries::with('countryDetails')->paginate(20);*/
        $countriesQuery = Countries::with('countryDetails');

        /*Country List*/
        $countryDetails = Countries::all();

        /*Country List*/
        $countryList = $countryDetails->pluck('name','id');

        /*Country Status*/
        $countryStatus = ['Active'=>'true','Inactive'=>'false'];

        $statusValue = $activeConditions = $selectedCountryId = '';
        if(!empty($request->query('active'))){
            $statusValue = $request->query('active');
            if($statusValue == 'true'){
                $countriesQuery->where('active', true);
            }else{
               $countriesQuery->where('active', false);
            }
        }

        if(!empty($request->query('country_id'))){
            $selectedCountryId = $request->query('country_id');
             $countriesQuery->where('id', $selectedCountryId);
        }

        // dd($countryId);


       // Paginate the results
        $countries = $countriesQuery->paginate(20);

       // dd($countries);  

        return view('countries.index',compact('parentMenu','pageTitle','countries','countryList','countryStatus','statusValue','selectedCountryId'));
    
    }

    /*Funtion For Showing Add Countries*/
    public function add(){

        $parentMenu = 'Segment & Currency Setup';
 	
        $pageTitle = "Add";
        /*Controller*/
        // ,['pageTitle' => $this->pageTitle]

        return view('countries.add',compact('parentMenu','pageTitle'));
    
    }

        /*Funtion For Storing Countries*/
        public function store(Request $request){

            $country = Countries::create([
            'name' => $request->input('name'),
            'alpha_2_code' => $request->input('alpha_2_code'),
            'alpha_3_code' => $request->input('alpha_3_code'),
            'calling_code' => $request->input('calling_code'),
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

            $countryDetail = CountryDetail::create([
             'country_id' => $country->id,
             'created' => now(), // Set the created timestamp
             'modified' => now(),
            ]);

            // Handle image uploads
            if ($request->hasFile('cover_image')) {

            $image = $request->file('cover_image');   

            $folder = 'images/country_details/cover_image/'.$countryDetail->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $countryDetail->cover_image = $image->getClientOriginalName();
           }

            if ($request->hasFile('icon_image')) {
             
             $image = $request->file('icon_image'); 

             $folder = 'images/country_details/icon_image/'.$countryDetail->id;
                 
             // Save the image directly to the public folder
             $image->move(public_path($folder), $image->getClientOriginalName()); 

             $countryDetail->icon_image = $image->getClientOriginalName();
             //dd($countryDetail->icon_image);
            }

            $countryDetail->save();

            return redirect()->route('countries.index');
    
        }

    public function edit($id)
    {
        $countries = Countries::findOrFail($id);

        $countryDetails = CountryDetail::where('country_id', $countries->id)->firstOrFail();
       
        //dd($countryDetails->cover_image);
        //dd($countryDetails);
        $parentMenu = 'Segment & Currency Setup';
    
        $pageTitle = "Edit";
        return view('countries.edit',compact('parentMenu','pageTitle','countries','countryDetails'));
    }

    /* Function For Updating Countries */
    public function update(Request $request, $id)
    {
    // Find the country by ID
    $country = Countries::find($id);

    if (!$country) {
        return redirect()->route('countries.index')->with('error', 'Country not found.');
    }

    // Update country details
    $country->update([
        'name' => $request->input('name'),
        'alpha_2_code' => $request->input('alpha_2_code'),
        'alpha_3_code' => $request->input('alpha_3_code'),
        'calling_code' => $request->input('calling_code'),
        'active' => $request->input('active'),
        'modified' => now(),
    ]);

    // Find or create country details
    $countryDetail = CountryDetail::updateOrCreate(
        ['country_id' => $country->id],
        ['modified' => now()]
    );

    // Handle image uploads
    if ($request->hasFile('cover_image')) {
    
        $image = $request->file('cover_image');   

        $folder = 'images/country_details/cover_image/'.$countryDetail->id;
        // Save the image directly to the public folder
        $image->move(public_path($folder), $image->getClientOriginalName()); 

        $countryDetail->cover_image = $image->getClientOriginalName();
    }

    if ($request->hasFile('icon_image')) {
             
        $image = $request->file('icon_image'); 

        $folder = 'images/country_details/icon_image/'.$countryDetail->id;
                 
             // Save the image directly to the public folder
        $image->move(public_path($folder), $image->getClientOriginalName()); 

        $countryDetail->icon_image = $image->getClientOriginalName();

    }

    $countryDetail->save();

    return redirect()->route('countries.index')->with('success', 'Country updated successfully.');
}

/*Function For Showing Countries*/
 public function show($id)
    {
        // Find the country by ID
        $country = Countries::find($id);

        if (!$country) {
            return redirect()->route('countries.index')->with('error', 'Country not found.');
        }

        // Retrieve additional details if needed
        $countryDetail = $country->countryDetail;

        $pageTitle = 'Countries';
        $parentMenu = 'Segment & Currency Setup';

        // You can pass the data to a view and display it
        return view('countries.show', compact('country', 'countryDetail','pageTitle','parentMenu'));
    }

}
