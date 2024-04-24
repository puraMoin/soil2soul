<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogcategory = BlogCategory::all();
        $pageTitle = 'Blog Category';
        $parentMenu = 'Blog';     
        //dd($users);die;

        return view('blogcategory.index',compact('blogcategory','pageTitle','parentMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add';
        return view('blogcategory.create',compact('pageTitle'));
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
            'name'=>['required'],   
        ]);

        $blogcategory = BlogCategory::create([
            'name' => $request->input('name'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),  
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);


        return redirect()->route('blogcategories.index');
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
       $blogcategory = BlogCategory::find($id);

        if (!$blogcategory) {
            return redirect()->route('blogcategories.index')->with('error', 'blogcategory not found.');
        }

        // Retrieve additional details if needed
        $pageTitle = 'View';
        $parentMenu = 'Blog';

        // You can pass the data to a view and display it
        return view('blogcategory.show', compact('blogcategory','pageTitle','parentMenu'));
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
        $blogcategory = BlogCategory::findOrFail($id);

        $parentMenu = 'Blog';
    
        $pageTitle = "Edit";
        return view('blogcategory.edit',compact('parentMenu','pageTitle','blogcategory'));
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
        $blogcategory = BlogCategory::find($id);

        if (!$blogcategory) {
            return redirect()->route('blogcategories.index')->with('error', 'blogcategories not found.');
         }

        $blogcategory->update([
            'name' => $request->input('name'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),  
            'active' => $request->input('active'),
            'created_at' => now(), // Set the created timestamp
            'updated_at' => now(),
        ]);

        return redirect()->route('blogcategories.index');
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
