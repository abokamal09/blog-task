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
                <tr>
                    <td><strong>Technology</strong></td>
                    <td>/technology</td>
                    <td>12</td>
                    <td><a href="#" style="text-decoration: underline;">Edit</a></td>
                </tr>
                <tr>
                    <td><strong>Design</strong></td>
                    <td>/design</td>
                    <td>8</td>
                    <td><a href="#" style="text-decoration: underline;">Edit</a></td>
                </tr>
                <tr>
                    <td><strong>Lifestyle</strong></td>
                    <td>/lifestyle</td>
                    <td>5</td>
                    <td><a href="#" style="text-decoration: underline;">Edit</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="widget" style="height: fit-content;">
        <h3 class="widget-title">Add Category</h3>
        <form action="#">
            <div class="form-group">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control" placeholder="e.g. Health">
            </div>
            <div class="form-group">
                <label class="form-label">Slug (Optional)</label>
                <input type="text" class="form-control" placeholder="e.g. health">
            </div>
            <button class="btn btn-primary btn-block">Save Category</button>
        </form>
    </div>

</div>

@endsection