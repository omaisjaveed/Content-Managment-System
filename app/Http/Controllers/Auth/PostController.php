<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Post\Createrequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['gallery','category'])->get();
        return view('auth.posts.index' ,compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('auth.posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Createrequest $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'file' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
                'category' => 'required|exists:categories,id',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
    
            $gallery = null;
    
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('images/posts', $fileName, 'public');
    
                $gallery = Gallery::create([
                    'image' => $fileName,
                ]);
            }
    
            Post::create([
                'category_id' => $request->category,
                'is_publish' => $request->is_publish,
                'title' => $request->title,
                'description' => $request->description,
                'gallery_id' => $gallery ? $gallery->id : null,
            ]);
    
        } catch (\Exception $ex) {
            \Log::error('Error occurred while creating a post: ' . $ex->getMessage());
        }
        
        $request->session()->flash('alert-success', 'Post Created SuccessFully');
        return to_route('Posts.index');



    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
