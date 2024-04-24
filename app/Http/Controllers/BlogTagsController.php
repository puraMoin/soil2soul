<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogTag;

class BlogTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogtags = BlogTag::all();
        $pageTitle = 'BlogTag';
        $parentMenu = 'Blog';     

        return view('blogtags.index',compact('blogtags','pageTitle','parentMenu'));
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
        return view('blogtags.create',compact('pageTitle'));
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
        $request->validate([   
            'name'=>['required'],   
        ]);

        $blogtag = BlogTag::create([
            'name' => $request->input('name'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),  
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);


        return redirect()->route('blogtags.index');
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
        $blogtag = BlogTag::find($id);

        if (!$blogtag) {
            return redirect()->route('blogtags.index')->with('error', 'blogtag not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'View';
        $parentMenu = 'Blog';

        // You can pass the data to a view and display it
        return view('blogtags.show', compact('blogtag','pageTitle','parentMenu'));
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
        $blogtag = BlogTag::findOrFail($id);

        $parentMenu = 'Blog';
    
        $pageTitle = "Edit";
        return view('blogtags.edit',compact('parentMenu','pageTitle','blogtag'));
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
        //
        $blogtag = BlogTag::find($id);

        if (!$blogtag) {
            return redirect()->route('blogtags.index')->with('error', 'blogtags not found.');
         }

        $blogtag->update([
            'name' => $request->input('name'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),  
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

        return redirect()->route('blogtags.index');
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
