<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index() {

         $categories = Category::all();
        $tags = Tag::all();

         $posts = Auth::user()->posts()->latest()->paginate(6);

        return view('users.dashboard', [
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function userPosts(User $user) {

        $userPosts = $user->posts()->latest()->paginate(6);
    
        return view('users.posts', [ 
            'posts' => $userPosts,
            'user' => $user
        
        ]);
    }

}
