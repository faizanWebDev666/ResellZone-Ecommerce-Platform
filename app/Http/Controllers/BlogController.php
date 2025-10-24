<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{
     public function index()
    {
        $blogs = blogs::latest()->paginate(5);
        return view('showBlog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = blogs::where('slug', $slug)->firstOrFail();
        return view('blogDetail', compact('blog'));
    }

    // Admin Side
    public function adminIndex()
    {
        $blogs = blogs::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.admmincreateBlog');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($request->title) . '-' . uniqid();

        $blog = new blogs();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->excerpt = Str::limit(strip_tags($request->content), 150);
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        $blog->save();

        return redirect()->route('admin.blog.create')->with('success', 'Blog post created!');
    }
   public function like($id)
{
    $blog = blogs::findOrFail($id);
    $blog->increment('likes_count'); 
    return back();
}


public function dislike($id)
{
    $blog = blogs::findOrFail($id);
    $blog->dislikes_count = $blog->dislikes_count + 1;
    $blog->save();
    return back();
}

public function comment(Request $request, $id)
{
    $request->validate(['comment' => 'required|string|max:1000']);
    
    $blog = blogs::findOrFail($id);
    $blog->comments()->create([
        'user_id' => auth()->id(), // or null if guest allowed
        'comment' => $request->comment,
    ]);

    return back();
}

}
