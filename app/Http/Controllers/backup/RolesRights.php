<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolesRight;
use App\Models\MenuLink;

class RolesRightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Roles Rights';
        $parentMenu = 'Super Master';
        // Eager load the related CountryDetail model
        $roles = RolesRight::all();

        return view('rolesrights.index',compact('parentMenu','pageTitle','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentMenu = 'Super Master';
    
        $pageTitle = "Add";
        /*Controller*/
        // ,['pageTitle' => $this->pageTitle]
        $menuLinks = MenuLink::all();

       /* dd($menuLinks);*/

        return view('rolesrights.create',compact('parentMenu','pageTitle','menuLinks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => ['required'],
            'role_description'=>['required']
             ]);


        $role = RolesRight::create([
            'role_name' => $request->input('role_name'),
            'role_description' => $request->input('role_description'),
            'acive' => $request->input('acive'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

        return redirect()->route('roles-rights.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = RolesRight::find($id);

        if (!$role) {
            return redirect()->route('roles-rights.index')->with('error', 'Role not found.');
        }

        // Retrieve additional details if needed

        $pageTitle = 'Roles Rights';
        $parentMenu = 'Super Master';

        // You can pass the data to a view and display it
        return view('rolesrights.show', compact('role','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $role = RolesRight::findOrFail($id);

       $parentMenu = 'Super Master';
    
       $pageTitle = "Edit";
       return view('rolesrights.edit',compact('parentMenu','pageTitle','role'));
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
      $role = RolesRight::find($id);
      $role->update([
        'role_name' => $request->input('role_name'),
        'role_description' => $request->input('role_description'),
        'acive' => $request->input('acive'),
        'created' => now(), // Set the created timestamp
        'modified' => now(),
     ]);

    return redirect()->route('roles-rights.index');
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
