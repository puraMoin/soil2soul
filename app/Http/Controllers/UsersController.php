<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\RolesRight;
use App\Models\AdminType;

class UsersController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        // Show change password form
    public function showChangePasswordForm()
    {
        $pageTitle = 'Users';
        return view('users.changepassword',compact('pageTitle'));
    }
    // Handle change password form submission
    public function changePassword(Request $request)
    {
        //dd($request);
        // Validate the form data
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Verify current password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'The current password is incorrect.']);
        }

        // Compare new password and confirm password
        if ($request->new_password !== $request->confirm_password) {
            return back()->withErrors(['confirm_password' => 'The new password and confirm password do not match.']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('success', 'Password changed successfully!');

        return redirect()->route('users.index');
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Users';
        $parentMenu = 'Super Master';

        $usersQuery = User::with(['roles','adminTypes']);

        $users = $usersQuery->paginate(20);
       
        //dd($users);die;

        return view('users.index',compact('users','pageTitle','parentMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $pageTitle = 'Add';
        $rolesRights = RolesRight::all()->where('active',true);
        $adminTypes = AdminType::all()->where('active',true);

        return view('users.create',compact('pageTitle','rolesRights','adminTypes'));
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
            'admin_type_id'=>['required'],
            'name'=>['required'],
            'email'=>['required'],
            'password'=>['required'],
        ]);

         $roleId = 1;
        
         $adminTypeId = $request->input('admin_type_id');

         $role = RolesRight::find($roleId);

         $adminTypes = AdminType::find($adminTypeId);
         

        if(!empty($role))
        {
            $role_id = $role->id;
        } 

        if(!empty($adminTypes))
        {
            $admin_type_id = $adminTypes->id;
        }

        $users = User::create([
            'role_id' => $role_id,
            'admin_type_id'=> $admin_type_id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'contact_no' => $request->input('contact_no'),
            'alternate_no' => $request->input('alternate_no'),
            'its_seo_users' => $request->input('its_seo_users'),
            'its_report_manager' => $request->input('its_report_manager'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
        if ($request->hasFile('image')) {

            $image = $request->file('image');   

            $folder = 'images/users/image/'.$users->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $users->image = $image->getClientOriginalName();
           }

           $users->save();

        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('states.index')->with('error', 'State not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'Users';
        $parentMenu = 'Super Master';

        // You can pass the data to a view and display it
        return view('users.show', compact('user','pageTitle','parentMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $role = RolesRight::where('id', $user->role_id)->first(); 

        $roles = RolesRight::where('id', '!=', $role->id)->get();

        $adminType =  AdminType::where('id', $user->admin_type_id)->first();    

        $adminTypes =  AdminType::where('id', '!=', $adminType->id)->get();    

        $parentMenu = 'Super Master';
    
        $pageTitle = "Edit";
        return view('users.edit',compact('parentMenu','pageTitle','user','role','roles','adminType','adminTypes'));
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
         $user = User::find($id);

          if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
         }

        $roleId = 1;
        $adminTypeId = $request->input('admin_type_id');


         $role = RolesRight::find($roleId);
         $adminTypes = AdminType::find($adminTypeId);
         

        if(!empty($role))
        {
            $role_id = $role->id;
        } 
        if(!empty($adminTypes))
        {
            $admin_type_id = $adminTypes->id;
        }

        $user->update([
            'role_id' => $role_id,
            'admin_type_id'=> $admin_type_id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'alternate_no' => $request->input('alternate_no'),
            'its_seo_users' => $request->input('its_seo_users'),
            'its_report_manager' => $request->input('its_report_manager'),
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

         // Handle image uploads
        if ($request->hasFile('image')) {

            $image = $request->file('image');   

            $folder = 'images/users/image/'.$user->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $user->image = $image->getClientOriginalName();
           }

           $user->save();

        return redirect()->route('users.index');
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
