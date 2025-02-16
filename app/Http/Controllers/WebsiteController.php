<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WebsiteController extends Controller
{
    public function show_home_page(){

        
        $post = Post::where('is_publish', Post::Published)->get();
       
        return view('website.blog.index',compact('post'));
    }
}
