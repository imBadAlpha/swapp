<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
require_once(app_path().'/helpers.php');

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (auth()->user()->hasRole(1)){
            $posts = Post::with('user')->get();

            return view('admin.posts.index', compact('posts', 'user'));
        } else {
            $posts = Post::where('user_id', Auth::id())
             ->with('user')
             ->paginate(10);

            return view('posts.index', compact('posts', 'user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $post = new Post;
        $post->title = $request->input('title');
        $post->user_id = Auth::id();
        $post->description = $request->input('description');
        $post->image = $imageName;

        $post->save();
        
        return redirect()->back()->with('success', 'Post added successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', compact('post'));
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
        $post = Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        
        if ($request->hasFile('image')) {
            // Remove old image
            $deleted = $post->image;
            unlink(storage_path('app/public/images/'.$post->image));
            
            // Save new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->back()->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(storage_path('app/public/images/'.$post->image));
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }

}
