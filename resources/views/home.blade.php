@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- DEBUG: Posts count = {{ $posts->count() }}, Total = {{ $posts->total() }} -->
<div class="container main-wrapper">

    <main class="posts-column">
        <div class="posts-grid">
            @forelse($posts as $post)
            <article class="post-card">
                <img src="{{ $post->image_url ?? 'https://placehold.co/600x400/e2e8f0/64748b?text=Post+Image' }}" alt="{{ $post->title }}" class="post-img">
                <div class="post-body">
                    <div class="post-meta">{{ $post->created_at->format('M d, Y') }} • {{ $post->category->name }}</div>
                    <h2 class="post-title"><a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a></h2>
                    <p class="post-excerpt">{{ $post->description }}</p>
                    <a href="{{ route('post', $post->slug) }}" class="read-more">Read Article →</a>
                </div>
            </article>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #64748b;">
                <p>No posts available yet. Check back soon!</p>
            </div>
            @endforelse
        </div>

        @if($posts->hasPages())
        <div class="pagination-container">
            {{ $posts->links() }}
        </div>
        @endif
    </main>

    <aside class="sidebar">

        <div class="widget">
            <input type="text" placeholder="Search posts..." class="search-input">
        </div>

        <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <div class="tags-cloud">
                @foreach($categories as $category)
                <a href="{{ route('home', ['category' => $category->slug]) }}" class="tag">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>

    </aside>

</div>
@endsection
