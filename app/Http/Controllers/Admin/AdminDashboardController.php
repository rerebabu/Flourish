<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     public function index()
    {
        return view('admin.dashboard', [
        'totalUsers' => User::count(),
        'verifiedUsers' => User::whereNotNull('email_verified_at')->count(),
        'totalPosts' => Post::count(),
        'totalCategories' => Category::count(),
        'registrationsByDay' => User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->limit(7)
            ->get(),
        'recentPosts' => Post::with('user')->latest()->limit(5)->get(),
        ]);
    }

    public function users() {
        $users = User::where('is_admin', false)->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function admins() {
        $admins = User::where('is_admin', true)->latest()->paginate(10);
        return view('admin.admins.index', compact('admins'));
    }

    public function allPosts() {
        $posts = Post::with('user', 'category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function categories() {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function tags() {
        $tags = Tag::latest()->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    public function settings() {
        return view('admin.settings.index');
    }
}
