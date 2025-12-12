<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Dashboard methods
    public function index()
    {
        $this->authorize('viewAny', Post::class);

        $posts = Post::with(['user', 'category'])
            ->latest()
            ->paginate(10);

        return view("dashboard.posts.index", compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        $categories = Category::all();
        return view("dashboard.posts.create", compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
        ]);

        $validated['user_id'] = Auth::id();

        Post::create($validated);

        return redirect()->route('dashboard.posts')
            ->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        return view("dashboard.posts.edit", compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
        ]);

        $post->update($validated);

        return redirect()->route('dashboard.posts')
            ->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('dashboard.posts')
            ->with('success', 'Post deleted successfully!');
    }

    // Frontend methods
    public function viewPost($slug)
    {
        $post = Post::where('slug', $slug)
            ->with(['user', 'category'])
            ->firstOrFail();

        $this->authorize('view', $post);

        return view("post", compact('post'));
    }
}
