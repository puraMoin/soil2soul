<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Countries;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageTitle = 'States';
        $parentMenu = 'Segment & Currency Setup';
        // Eager load the related CountryDetail model
        // $states = State::with('country');
        $statesQuery = State::with('country');

        $countries = Countries::all()->where('active',true);
        $countryList = $countries->pluck('name','id');


        $stateDetail = State::all();

        /*Country List*/
        $stateList = $statesQuery->pluck('name','id');


        $selectedCountryId = $selectedStateId = '';
        /*Filter By Country Id*/
        if(!empty($request->query('country_id'))){
            $selectedCountryId = $request->query('country_id');
            $statesQuery->where('country_id', $selectedCountryId);
        }

        /*Filte By State Id*/
         if(!empty($request->query('state_id'))){
            $selectedStateId = $request->query('state_id');
            $statesQuery->where('id', $selectedStateId);
        }

        $states = $statesQuery->paginate(20);

        //dd($states);die;

        return view('states.index',compact('parentMenu','pageTitle','states','countryList','selectedCountryId','stateList','selectedStateId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentMenu = 'Segment & Currency Setup';
        $pageTitle = "Add";
        /*Controller*/
        // ,['pageTitle' => $this->pageTitle]
        $countries = Countries::all();

        return view('states.create',compact('parentMenu','pageTitle','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate the request data
            $request->validate([
            'country_id' => ['required']
             ]);

        $countryName = $request->input('country_id');

        $country = Countries::where('name', $countryName)->first();
        if(!empty($country))
        {
            $country_id = $country->id;
        } 

        $state = State::create([
            'country_id' => $country_id,
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

        return redirect()->route('states.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Find the country by ID
        $states = State::find($id);

        if (!$states) {
            return redirect()->route('states.index')->with('error', 'State not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'States';
        $parentMenu = 'Segment & Currency Setup';

        // You can pass the data to a view and display it
        return view('states.show', compact('states','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = State::findOrFail($id);

        $country = Countries::where('id', $states->country_id)->first(); 

        $countries = Countries::where('id', '!=', $country->id)->get();

        $parentMenu = 'Segment & Currency Setup';
    
        $pageTitle = "Edit";
        return view('states.edit',compact('parentMenu','pageTitle','states','countries','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $state = State::find($id);

        //dd($state);

        if (!$state) {
            return redirect()->route('states.index')->with('error', 'State not found.');
         }

        $countryName = $request->input('country_id');

        $country = Countries::where('name', $countryName)->first();
        if(!empty($country))
        {
            $country_id = $country->id;
        } 

         $state->update([
            'country_id' => $country_id,
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

        return redirect()->route('states.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

  public function getStates($countryId)
     {
            
     $states = State::where('country_id', $countryId)->get();

     return response()->json($states);
    }
}
