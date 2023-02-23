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
            $message = 'unliked';
        } else {
            $user->likedPosts()->attach($post);
            $message = 'liked';
            
        }

        $likeCount = $post->likers->count();

        return response()->json([
            'message' => $message,
            'likeCount' => $likeCount,
            'liked' => $user->likedPosts->contains($post),
        ]);
    }
}
