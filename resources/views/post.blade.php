@extends('layouts.app')

@section('title', 'The Future of CSS Grid - Modern Blog')

@section('content')

<div class="container main-wrapper">

    <article class="single-article">

        <header class="article-header">
            <a href="#" class="article-category">Technology</a>
            <h1 class="article-title">The Future of CSS Grid: Designing for the Modern Web</h1>
            <div class="article-meta">
                By <span class="author">Ahmed Kamal</span> • <span class="date">Oct 24, 2023</span>
            </div>
        </header>

        <div class="article-image-wrapper">
            <img src="https://placehold.co/800x450/e2e8f0/64748b?text=Article+Header" alt="CSS Grid" class="featured-image">
        </div>

        <div class="article-body">
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.
            </p>

            <p>
                Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            </p>

            <h2>Why Layouts Matter</h2>
            <p>
                Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.
            </p>

            <blockquote>
                "Design is not just what it looks like and feels like. Design is how it works."
            </blockquote>

            <p>
                Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh.
            </p>

            <h3>Key Takeaways</h3>
            <ul>
                <li>CSS Grid allows for two-dimensional layouts.</li>
                <li>Flexbox is better for one-dimensional layouts.</li>
                <li>Always prioritize accessibility and semantic HTML.</li>
            </ul>

            <p>
                Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis.
            </p>
        </div>

        <footer class="article-footer">
            <div class="tags-cloud">
                <span class="tag">#WebDesign</span>
                <span class="tag">#CSS</span>
                <span class="tag">#Frontend</span>
            </div>
            <div class="share-links">
                Share this post: <a href="#">Twitter</a> • <a href="#">Facebook</a>
            </div>
        </footer>

    </article>

    <aside class="sidebar">

        <div class="widget">
            <h3 class="widget-title">Search</h3>
            <input type="text" placeholder="Type and hit enter..." class="search-input">
        </div>

        <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <div class="tags-cloud">
                <a href="#" class="tag">Technology</a>
                <a href="#" class="tag">Design</a>
                <a href="#" class="tag">Laravel</a>
                <a href="#" class="tag">Lifestyle</a>
            </div>
        </div>

    </aside>

</div>

@endsection