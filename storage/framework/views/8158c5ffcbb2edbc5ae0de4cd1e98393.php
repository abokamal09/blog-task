<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<!-- DEBUG: Posts count = <?php echo e($posts->count()); ?>, Total = <?php echo e($posts->total()); ?> -->
<div class="container main-wrapper">

    <main class="posts-column">
        <div class="posts-grid">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="post-card">
                <img src="<?php echo e($post->image_url ?? 'https://placehold.co/600x400/e2e8f0/64748b?text=Post+Image'); ?>" alt="<?php echo e($post->title); ?>" class="post-img">
                <div class="post-body">
                    <div class="post-meta"><?php echo e($post->created_at->format('M d, Y')); ?> • <?php echo e($post->category->name); ?></div>
                    <h2 class="post-title"><a href="<?php echo e(route('post', $post->slug)); ?>"><?php echo e($post->title); ?></a></h2>
                    <p class="post-excerpt"><?php echo e($post->description); ?></p>
                    <a href="<?php echo e(route('post', $post->slug)); ?>" class="read-more">Read Article →</a>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem; color: #64748b;">
                <p>No posts available yet. Check back soon!</p>
            </div>
            <?php endif; ?>
        </div>

        <?php if($posts->hasPages()): ?>
        <div class="pagination-container">
            <?php echo e($posts->links()); ?>

        </div>
        <?php endif; ?>
    </main>

    <aside class="sidebar">

        <div class="widget">
            <input type="text" placeholder="Search posts..." class="search-input">
        </div>

        <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <div class="tags-cloud">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('home', ['category' => $category->slug])); ?>" class="tag"><?php echo e($category->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </aside>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\task-baup\blog-task\resources\views/home.blade.php ENDPATH**/ ?>