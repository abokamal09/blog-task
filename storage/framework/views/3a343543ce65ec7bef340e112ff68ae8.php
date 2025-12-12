<?php $__env->startSection('title', $post->title . ' - Modern Blog'); ?>

<?php $__env->startSection('content'); ?>

<div class="container main-wrapper">

    <article class="single-article">

        <header class="article-header">
            <a href="#" class="article-category"><?php echo e($post->category->name); ?></a>
            <h1 class="article-title"><?php echo e($post->title); ?></h1>
            <div class="article-meta">
                By <span class="author"><?php echo e($post->user->name); ?></span> • <span class="date"><?php echo e($post->created_at->format('M d, Y')); ?></span>
            </div>
        </header>

        <?php if($post->image_url): ?>
        <div class="article-image-wrapper">
            <img src="<?php echo e($post->image_url); ?>" alt="<?php echo e($post->title); ?>" class="featured-image">
        </div>
        <?php endif; ?>

        <div class="article-body">
            <?php echo $post->content; ?>

        </div>

        <footer class="article-footer">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\task-baup\blog-task\resources\views/post.blade.php ENDPATH**/ ?>