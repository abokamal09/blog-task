@extends('layouts.dashboard')

@section('title', 'Manage Posts')
@section('dash-title', 'Editorial Posts')

@section('dash-content')

<div style="margin-bottom: 2rem; display: flex; justify-content: flex-end;">
    <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary">Create New Post +</a>
</div>

@if(session('success'))
<div style="padding: 1rem; margin-bottom: 1rem; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 0.5rem; color: #155724;">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive">
    <table class="ledger-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>
                    <strong>{{ $post->title }}</strong><br>
                    <span style="font-size: 0.8rem; color: #64748b;">
                        @if($post->status === 'published')
                        Published on {{ $post->created_at->format('M d, Y') }}
                        @else
                        Last edited {{ $post->updated_at->diffForHumans() }}
                        @endif
                    </span>
                </td>
                <td>{{ $post->user->name }}</td>
                <td><span class="tag" style="font-size: 0.7rem;">{{ $post->category->name }}</span></td>
                <td>
                    @if($post->status === 'published')
                    <span style="color: green; font-weight: bold;">● Live</span>
                    @else
                    <span style="color: orange; font-weight: bold;">● Draft</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('dashboard.posts.edit', $post) }}" class="btn btn-outline btn-sm">Edit</a>
                    <form action="{{ route('dashboard.posts.destroy', $post) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 2rem; color: #64748b;">
                    No posts found. <a href="{{ route('dashboard.posts.create') }}">Create your first post</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($posts->hasPages())
<div style="margin-top: 2rem;">
    {{ $posts->links() }}
</div>
@endif

@endsection
