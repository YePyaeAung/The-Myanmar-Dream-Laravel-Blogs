<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(6),
        ]);
    }
    public function create()
    {
        return view('admin.blogs.create', [
            'categories' => Category::all(),
        ]);
    }
    public function store()
    {
        $blogCreatedForm =request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'intro' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        $blogCreatedForm['user_id'] = auth()->id();
        $blogCreatedForm['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Blog::create($blogCreatedForm);
        return redirect('/admin/blogs')->with('success', "Blog Created Successfully!");
    }
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all(),
        ]);
    }
    public function update(Blog $blog)
    {
        $blogUpdatedForm =request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')->ignore($blog->id)],
            'intro' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        $blogUpdatedForm['user_id'] = auth()->id();
        $blogUpdatedForm['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('thumbnails') : $blog->thumbnail;
        $blog->update($blogUpdatedForm);
        return redirect('/admin/blogs')->with('success', "Blog Updated Successfully!");
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', "Blog Deleted Successfully!");
    }
}
