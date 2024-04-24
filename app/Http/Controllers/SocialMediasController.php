<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageTitle = 'Social Media';
        $parentMenu = 'Super Master';

        $socialmedias = SocialMedia::all();

        return view('socialmedias.index',compact('parentMenu','pageTitle','socialmedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pageTitle = 'Add';

        return view('socialmedias.create',compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
               //dd($request);die;     
       $request->validate([
            'name' => ['required'],
            'link'=>['required'],         
        ]);

        $socialmedia = SocialMedia::create([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
        if ($request->hasFile('image_icon')) {

            $image = $request->file('image_icon');   

            $folder = 'images/socialmedias/image_icon/'.$socialmedia->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $socialmedia->image_icon = $image->getClientOriginalName();
           }

           $socialmedia->save();

        return redirect()->route('socialmedias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $socialmedia = SocialMedia::find($id);

        if (!$socialmedia) {
            return redirect()->route('socialmedias.index')->with('error', 'socialmedias not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'SocialMedia';
        $parentMenu = 'Super Master';

        // You can pass the data to a view and display it
        return view('socialmedias.show', compact('socialmedia','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $socialmedia = SocialMedia::findOrFail($id);

        $parentMenu = 'Super Master';
    
        $pageTitle = "Edit";
        return view('socialmedias.edit',compact('parentMenu','pageTitle','socialmedia'));
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
        //dd($request);
        $socialmedia = SocialMedia::find($id);

          if (!$socialmedia) {
            return redirect()->route('socialmedias.index')->with('error', 'Socialmedia not found.');
         }

        $socialmedia->update([
            'name' => $request->input('name'),
            'link' => $request->input('link'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
        if ($request->hasFile('image_icon')) {

            $image = $request->file('image_icon');   

            $folder = 'images/socialmedias/image_icon/'.$socialmedia->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $socialmedia->image_icon = $image->getClientOriginalName();
           }

           $socialmedia->save();

        return redirect()->route('socialmedias.index');
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
}
