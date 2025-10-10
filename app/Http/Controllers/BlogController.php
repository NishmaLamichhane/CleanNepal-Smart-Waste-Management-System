<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display all blogs.
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a new blog post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title',
            'summary' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'video_url' => 'nullable|url',
            'photopath' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photopath')) {
            $file = $request->file('photopath');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/blogs'), $filename);
            $validated['photopath'] = $filename;
        }

        Blog::create($validated);

        return redirect()->route('blog.index')->with('success', 'Blog post created successfully!');
    }

    /**
     * Show edit form.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update blog post.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title,' . $blog->id,
            'summary' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'video_url' => 'nullable|url',
            'photopath' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photopath')) {
            // delete old image
            if ($blog->photopath && file_exists(public_path('images/blogs/' . $blog->photopath))) {
                unlink(public_path('images/blogs/' . $blog->photopath));
            }

            $file = $request->file('photopath');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/blogs'), $filename);
            $validated['photopath'] = $filename;
        }

        $blog->update($validated);

        return redirect()->route('blog.index')->with('success', 'Blog post updated successfully!');
    }

    /**
     * Delete a blog post.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->photopath && file_exists(public_path('images/blogs/' . $blog->photopath))) {
            unlink(public_path('images/blogs/' . $blog->photopath));
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully!');
    }
}
