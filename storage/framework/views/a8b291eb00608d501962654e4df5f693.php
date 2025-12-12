<header class="navbar">
    <div class="nav-container">
        <a href="/" class="logo">LOGO</a>

        <?php if(auth()->guard()->check()): ?>
        <div class="nav-links">
            <?php if(auth()->user()->is_admin): ?>

            <a href="/dashboard/users" class="btn btn-primary">Dashboard</a>
            <?php endif; ?>

            <a href="/logout" class="btn btn-outline">Log Out</a>
        </div>
        <?php endif; ?>


        <?php if(auth()->guard()->guest()): ?>
        <div class="nav-links">
            <a href="/login" class="btn btn-outline">Log In</a>
            <a href="/register" class="btn btn-primary">Register</a>
        </div>
        <?php endif; ?>
    </div>
</header><?php /**PATH D:\task-baup\blog-task\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>