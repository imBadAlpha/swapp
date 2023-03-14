<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
require_once(app_path().'/helpers.php');

class SearchController extends Controller
{
    public function query(Request $request)
    {
        $user = Auth::user();

        if($request->has('search')) {
            $posts = Post::search($request->search)->get();
        } else {
            $posts = Post::where('user_id', '!=', Auth::id())
            ->with('user')
            ->withCount(['offers' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->paginate(10);
        }

        return view('dashboard', compact('user', 'posts'));
    }
}
