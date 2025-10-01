<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        // Add more info as needed
        return view('dashboard', compact('postCount'));
    }
}
