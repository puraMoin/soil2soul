<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminType;

class AdminTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Admin Type';
        $parentMenu = 'Super Master';
        $admintypes = AdminType::all();

          return view('admintypes.index',compact('parentMenu','pageTitle','admintypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pageTitle = "Admin Type";
        $parentMenu = 'Super Master';

         return view('admintypes.create',compact('parentMenu','pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);die;    
        $request->validate([
            'name' => ['required']     
             ]);

         $admintype = AdminType::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         return redirect()->route('admintypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admintype = AdminType::find($id);

        if (!$admintype) {
            return redirect()->route('admintypes.index')->with('error', 'Role not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'Admin Type';
        $parentMenu = 'Super Master';

        // You can pass the data to a view and display it
        return view('admintypes.show', compact('admintype','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $admintype = AdminType::findOrFail($id);
       /*dd($role);*/
       //dd($menuLinks);
       $parentMenu = 'Super Master';
    
       $pageTitle = "Edit";
       return view('admintypes.edit',compact('parentMenu','pageTitle','admintype'));
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
      $admintype = AdminType::find($id);

        if (!$admintype) {
            return redirect()->route('admintypes.index')->with('error', 'Role not found.');
         }

       // Update the role information
        $admintype->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

    return redirect()->route('admintypes.index');
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
