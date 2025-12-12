@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container main-wrapper">

    <main class="posts-column">
        <div class="posts-grid">
            <article class="post-card">
                <img src="https://placehold.co/600x400/e2e8f0/64748b?text=CSS+Grid" alt="Post Image" class="post-img">
                <div class="post-body">
                    <div class="post-meta">Oct 24, 2023 • Technology</div>
                    <h2 class="post-title"><a href="#">The Future of CSS Grid</a></h2>
                    <p class="post-excerpt">How modern layout techniques are changing the way we build the web...</p>
                    <a href="#" class="read-more">Read Article →</a>
                </div>
            </article>

            <article class="post-card">
                <img src="https://placehold.co/600x400/cbd5e1/64748b?text=Minimalism" alt="Post Image" class="post-img">
                <div class="post-body">
                    <div class="post-meta">Oct 22, 2023 • Design</div>
                    <h2 class="post-title"><a href="#">Minimalism in 2024</a></h2>
                    <p class="post-excerpt">Why whitespace is your best friend when designing complex interfaces.</p>
                    <a href="#" class="read-more">Read Article →</a>
                </div>
            </article>

            <article class="post-card">
                <img src="https://placehold.co/600x400/94a3b8/ffffff?text=Laravel" alt="Post Image" class="post-img">
                <div class="post-body">
                    <div class="post-meta">Oct 20, 2023 • Coding</div>
                    <h2 class="post-title"><a href="#">Mastering Laravel Blade</a></h2>
                    <p class="post-excerpt">Tips and tricks to keep your templates clean and maintainable.</p>
                    <a href="#" class="read-more">Read Article →</a>
                </div>
            </article>

            <article class="post-card">
                <img src="https://placehold.co/600x400/475569/ffffff?text=Remote+Work" alt="Post Image" class="post-img">
                <div class="post-body">
                    <div class="post-meta">Oct 18, 2023 • Lifestyle</div>
                    <h2 class="post-title"><a href="#">Remote Work Balance</a></h2>
                    <p class="post-excerpt">Finding the sweet spot between productivity and mental health.</p>
                    <a href="#" class="read-more">Read Article →</a>
                </div>
            </article>
        </div>

        <div class="pagination-container">
            Load More Posts
        </div>
    </main>

    <aside class="sidebar">

        <div class="widget">
            <input type="text" placeholder="Search posts..." class="search-input">
        </div>

        <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <div class="tags-cloud">
                @foreach($categories as $category)
                <a href="{{ $category->slug }}" class="tag">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>

    </aside>

</div>
@endsection