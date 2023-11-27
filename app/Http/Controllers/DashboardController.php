<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // count all blogs
        // number passed in this paginate function is the size of the page/chunk
        // advanced pagination
        // $blogs = Blog::getArticles()->paginate(10);
        // simple pagination
        // $blogs = Blog::paginate(10);

        //intermediate pagination
        // eager loading
        // n + 1 problem
        $blogs = Blog::with('author')->when(auth()->user(), function($query) {
            return $query->where('user_id', auth()->user()->id);
        })->paginate(10);

        // select * from blogs
        return Inertia::render(auth()->user() ? 'Dashboard': 'Blog', [
            'blogs' => $blogs
        ]);
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'article' => ['required', 'max:7500'],
            'slug' => ['required', Rule::exists('blogs')->ignore($request->id)]
        ]);


        $blog = Blog::updateOrCreate([
            'slug' => $request->slug,
        ],[
            'title' => $request->title,
            'article' => $request->article,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }

    public function showBlog($slug)
    {
        $blog = Blog::where('id', $slug)->with('author')->first();
        return Inertia::render("Article", [
            'blog' => $blog
        ]);
    }


    public function editBlog($id)
    {
        $blog = Blog::find($id);
        return Inertia::render('CreateBlog', [
            'blog' => $blog
        ]);
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
       
        if($blog->user_id == auth()->user()->id)
        {
            $blog->delete();
        }

        return redirect()->back();

    }
}
