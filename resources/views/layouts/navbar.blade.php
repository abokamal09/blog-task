<header class="navbar">
    <div class="nav-container">
        <a href="/" class="logo">LOGO</a>

        @auth
        <div class="nav-links">
            <a href="/logout" class="btn btn-outline">Log Out</a>
        </div>
        @endauth
        @guest
        <div class="nav-links">
            <a href="/login" class="btn btn-outline">Log In</a>
            <a href="/register" class="btn btn-primary">Register</a>
        </div>
        @endguest
    </div>
</header>