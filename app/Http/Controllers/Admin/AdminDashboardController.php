<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
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
}
