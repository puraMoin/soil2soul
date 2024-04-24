<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogAuthor;
use App\Models\BlogTag;
use App\Models\BlogBlogTag;
use Illuminate\Support\Facades\DB; 

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pageTitle = 'Blog List';
        
        /*Blog Query*/
        $blogQuery = Blog::with(['blogcategory','blogauthor','blogtags']);
        // Paginate the results
        $blogs = $blogQuery->paginate(20);

        //dd($blogs);

        return view('blogs.index',compact('blogs','pageTitle'));        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $pageTitle = "Add";

        /*Blog Categories*/
        $blogCategories = BlogCategory::all()->where('active',true);
        $blogCategoryList = $blogCategories->pluck('name','id');

        /*Blog Author*/
        $blogAuthors = BlogAuthor::all()->where('active',true);
        $blogAuthorList = $blogAuthors->pluck('author_name','id');
        

        /*Blog Tags*/
        $blogTags = BlogTag::all()->where('active',true);
        $blogTagList = $blogTags->pluck('name','id');

         return view('blogs.create',compact('pageTitle','blogCategoryList','blogAuthorList','blogTagList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'blog_category_id' => ['required'],
            'blog_author_id'=>['required'],
            'blogtags'=>['required'],
            'title'=>['required'],
             ]);

          $blogCatId = $request->input('blog_category_id');
          $blogAuthorId = $request->input('blog_author_id');

          $blogCat = BlogCategory::find($blogCatId);
          $blogAuthor = BlogAuthor::find($blogAuthorId);


        if(!empty($blogCat))
        {
            $blogCategoryId = $blogCat->id;
        } 
        if(!empty($blogAuthor))
        {
            $blogAuthorId = $blogAuthor->id;
        } 

        $blog = Blog::create([
            'blog_category_id' => $blogCategoryId,
            'blog_author_id' => $blogAuthorId,
            'blog_date' =>  $request->input('blog_date'),
            'title' => $request->input('title'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'header_text' => $request->input('header_text'),
            'description' => $request->input('description'),    
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

        if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/blog/image_file/'.$blog->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $blog->image_file = $image->getClientOriginalName();
           }

           $blog->save();

        foreach ($request->input('blogtags') as $blogtagsId) {
        $blogblogtags = BlogBlogTag::create([
            'blog_id' => $blog->id, // Assuming 'id' is the primary key of RolesRight table
            'blog_tag_id' => $blogtagsId,
            'created' => now(),
            'modified' => now(),
        ]);
     } 
        return redirect()->route('blogs.index');
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
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found.');
        }
        // Retrieve additional details if needed
        $pageTitle = 'Blog List';
        $parentMenu = 'Blog';

        // You can pass the data to a view and display it
        return view('blogs.show', compact('blog','pageTitle','parentMenu'));
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
       $blog = Blog::findOrFail($id);

       $blogCategory = BlogCategory::where('id', $blog->blog_category_id)->first(); 

       $blogCategories = BlogCategory::where('id', '!=', $blogCategory->id)->get();

       $blogAuthor = BlogAuthor::where('id', $blog->blog_author_id)->first();
       
       $blogAuthors = BlogAuthor::where('id', '!=', $blogAuthor->id)->get();

       $selectedBlogTags = $blog->blogtags;

       $blogtags = BlogTag::all(); 
       //dd($menuLinks);
       $parentMenu = 'Blog List';
       $pageTitle = "Edit";
       return view('blogs.edit',compact('parentMenu','pageTitle','blogCategory','blogCategories',
       	'blogAuthor','blogAuthors','selectedBlogTags','blog','blogtags'));
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
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'blog not found.');
         }

          $blogCatId = $request->input('blog_category_id');
          $blogAuthorId = $request->input('blog_author_id');

          $blogCat = BlogCategory::find($blogCatId);
          $blogAuthor = BlogAuthor::find($blogAuthorId);


        if(!empty($blogCat))
        {
            $blogCategoryId = $blogCat->id;
        } 
        if(!empty($blogAuthor))
        {
            $blogAuthorId = $blogAuthor->id;
        } 

        $blog->update([
            'blog_category_id' => $blogCategoryId,
            'blog_author_id' => $blogAuthorId,
            'blog_date' =>  $request->input('blog_date'),
            'title' => $request->input('title'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'header_text' => $request->input('header_text'),
            'description' => $request->input('description'),    
            'active' => $request->input('active'),
            'created' => now(), // Set the created timestamp
            'modified' => now(),
        ]);

        if ($request->hasFile('image_file')) {

            $image = $request->file('image_file');   

            $folder = 'images/blog/image_file/'.$blog->id;

            // Save the image directly to the public folder
            $image->move(public_path($folder), $image->getClientOriginalName());   
            //dd($image1Path);
            
            $blog->image_file = $image->getClientOriginalName();
           }

           $blog->save(); 

	    // Sync the associated menu links
	    $blog->blogtags()->sync($request->input('blogtags'));  

     return redirect()->route('blogs.index');

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
