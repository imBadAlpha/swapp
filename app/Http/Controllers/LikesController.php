<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like(Post $post)
    {
        $user = Auth::user();

        if ($user->likedPosts()->where('post_id', $post->id)->exists()) {
            $user->likedPosts()->detach($post);
        } else {
            $user->likedPosts()->attach($post);
            
        }

        return redirect()->back();
    }
}
