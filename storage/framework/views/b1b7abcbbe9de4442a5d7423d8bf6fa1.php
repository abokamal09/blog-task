<?php $__env->startSection('title', 'Manage Posts'); ?>
<?php $__env->startSection('dash-title', 'Editorial Posts'); ?>

<?php $__env->startSection('dash-content'); ?>

<div style="margin-bottom: 2rem; display: flex; justify-content: flex-end;">
    <a href="<?php echo e(route('dashboard.posts.create')); ?>" class="btn btn-primary">Create New Post +</a>
</div>

<?php if(session('success')): ?>
<div style="padding: 1rem; margin-bottom: 1rem; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 0.5rem; color: #155724;">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

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
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td>
                    <strong><?php echo e($post->title); ?></strong><br>
                    <span style="font-size: 0.8rem; color: #64748b;">
                        <?php if($post->status === 'published'): ?>
                        Published on <?php echo e($post->created_at->format('M d, Y')); ?>

                        <?php else: ?>
                        Last edited <?php echo e($post->updated_at->diffForHumans()); ?>

                        <?php endif; ?>
                    </span>
                </td>
                <td><?php echo e($post->user->name); ?></td>
                <td><span class="tag" style="font-size: 0.7rem;"><?php echo e($post->category->name); ?></span></td>
                <td>
                    <?php if($post->status === 'published'): ?>
                    <span style="color: green; font-weight: bold;">● Live</span>
                    <?php else: ?>
                    <span style="color: orange; font-weight: bold;">● Draft</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(route('dashboard.posts.edit', $post)); ?>" class="btn btn-outline btn-sm">Edit</a>
                    <form action="<?php echo e(route('dashboard.posts.destroy', $post)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" style="text-align: center; padding: 2rem; color: #64748b;">
                    No posts found. <a href="<?php echo e(route('dashboard.posts.create')); ?>">Create your first post</a>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if($posts->hasPages()): ?>
<div style="margin-top: 2rem;">
    <?php echo e($posts->links()); ?>

</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\task-baup\blog-task\resources\views/dashboard/posts/index.blade.php ENDPATH**/ ?>