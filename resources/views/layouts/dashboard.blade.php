@extends('layouts.app')

@section('content')
<div class="container dashboard-container">

    <aside class="dash-sidebar">
        <div class="dash-nav-title">Management</div>
        <nav class="dash-nav-list">
            <a href="{{ route('dashboard.users') }}"
                class="dash-nav-link {{ request()->routeIs('dashboard.users') ? 'active' : '' }}">
                Users Registry
            </a>
            <a href="{{ route('dashboard.posts') }}"
                class="dash-nav-link {{ request()->routeIs('dashboard.posts') ? 'active' : '' }}">
                Editorial Posts
            </a>
            <a href="{{ route('dashboard.categories') }}"
                class="dash-nav-link {{ request()->routeIs('dashboard.categories') ? 'active' : '' }}">
                Categories
            </a>
        </nav>
    </aside>

    <main class="dash-content">
        <h1 class="mb-4" style="font-family: var(--font-heading); margin-bottom: 1.5rem;">@yield('dash-title')</h1>

        @if(session('success'))
        <div style="background: #ecfccb; color: #365314; padding: 1rem; border: 1px solid #a3e635; margin-bottom: 1.5rem;">
            {{ session('success') }}
        </div>
        @endif

        @yield('dash-content')
    </main>

</div>
@endsection