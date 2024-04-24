<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogAuthor;

class BlogAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageTitle = 'Blog Author';
        $parentMenu = 'Blog';

        $blogauthors = BlogAuthor::all();

        return view('blogauthors.index',compact('parentMenu','pageTitle','blogauthors'));
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
        return view('blogauthors.create',compact('pageTitle'));
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
            'author_name'=>['required'],   
        ]);

        $blogauthor = BlogAuthor::create([
            'author_name' => $request->input('author_name'),
            'note' => $request->input('note'),  
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

                 // Handle image uploads
        if ($request->hasFile('author_image')) {

            $image = $request->file('author_image');   

            $folder = 'images/blog_author/author_image/'.$blogauthor->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $blogauthor->author_image = $image->getClientOriginalName();
           }

           $blogauthor->save();

           return redirect()->route('blogauthors.index');
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
        $blogauthor = BlogAuthor::find($id);

        if (!$blogauthor) {
            return redirect()->route('blogauthors.index')->with('error', 'blogauthors not found.');
        }
        // Retrieve additional details if needed
        $pageTitle = 'View';
        $parentMenu = 'Blog';

        // You can pass the data to a view and display it
        return view('blogauthors.show', compact('blogauthor','pageTitle','parentMenu'));
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
        $blogauthor = BlogAuthor::findOrFail($id);

        $parentMenu = 'Blog';
    
        $pageTitle = "Edit";
        return view('blogauthors.edit',compact('parentMenu','pageTitle','blogauthor'));
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
        $blogauthor = BlogAuthor::find($id);

        if (!$blogauthor) {
            return redirect()->route('blogauthors.index')->with('error', 'blogauthor not found.');
         }

        $blogauthor->update([
            'author_name' => $request->input('author_name'),
            'note' => $request->input('note'),  
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

        // Handle image uploads
        if ($request->hasFile('author_image')) {

            $image = $request->file('author_image');   

            $folder = 'images/blog_author/author_image/'.$blogauthor->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $blogauthor->author_image = $image->getClientOriginalName();
           }

           $blogauthor->save();

        return redirect()->route('blogauthors.index');
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
