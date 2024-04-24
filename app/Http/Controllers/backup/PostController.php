<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller{

    public function uploadImage(Request $request){
      
       $path = $request->file('image')->store('images'); // 'images' is the directory where the image will be stored
        
       echo $path;
    }


}
