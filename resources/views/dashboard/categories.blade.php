@extends('layouts.dashboard')

@section('title', 'Manage Categories')
@section('dash-title', 'Categories Index')

@section('dash-content')

<div class="main-wrapper" style="grid-template-columns: 1fr 1fr; gap: 2rem; padding: 0;">

    <div class="table-responsive">
        <table class="ledger-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Posts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>/{{ $category->slug }}</td>
                    <td>12</td>
                    <td><a href="#" style="text-decoration: underline;">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="widget" style="height: fit-content;">
        <h3 class="widget-title">Add Category</h3>
        <form action="{{ route('dashboard.categories.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" placeholder="e.g. Health" name="name">
            </div>
            <div class="form-group">
                <label class="form-label">Slug (Optional)</label>
                <input type="text" class="form-control" placeholder="e.g. health" name="slug">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save Category</button>
        </form>
    </div>

</div>

@endsection