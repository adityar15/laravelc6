<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
       return Inertia::render("Dashboard");
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'article' => ['required', 'max:7500'],
            'slug' => ['required', 'unique:blogs,slug']
        ]);


        $blog = Blog::create([
            'title' => $request->title,
            'article' => $request->article,
            'slug' => $request->slug,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }
}
