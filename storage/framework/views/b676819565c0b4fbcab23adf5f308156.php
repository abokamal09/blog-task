<?php $__env->startSection('content'); ?>
<div class="container dashboard-container">

    <aside class="dash-sidebar">
        <div class="dash-nav-title">Management</div>
        <nav class="dash-nav-list">
            <a href="<?php echo e(route('dashboard.users')); ?>"
                class="dash-nav-link <?php echo e(request()->routeIs('dashboard.users') ? 'active' : ''); ?>">
                Users Registry
            </a>
            <a href="<?php echo e(route('dashboard.posts')); ?>"
                class="dash-nav-link <?php echo e(request()->routeIs('dashboard.posts') ? 'active' : ''); ?>">
                Editorial Posts
            </a>
            <a href="<?php echo e(route('dashboard.categories')); ?>"
                class="dash-nav-link <?php echo e(request()->routeIs('dashboard.categories') ? 'active' : ''); ?>">
                Categories
            </a>
        </nav>
    </aside>

    <main class="dash-content">
        <h1 class="mb-4" style="font-family: var(--font-heading); margin-bottom: 1.5rem;"><?php echo $__env->yieldContent('dash-title'); ?></h1>

        <?php if(session('success')): ?>
        <div style="background: #ecfccb; color: #365314; padding: 1rem; border: 1px solid #a3e635; margin-bottom: 1.5rem;">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('dash-content'); ?>
    </main>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\task-baup\blog-task\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>