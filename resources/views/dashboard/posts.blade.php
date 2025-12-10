@extends('layouts.dashboard')

@section('title', 'Manage Posts')
@section('dash-title', 'Editorial Posts')

@section('dash-content')

<div style="margin-bottom: 2rem; display: flex; justify-content: flex-end;">
    <a href="#" class="btn btn-primary">Create New Post +</a>
</div>

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
            <tr>
                <td>
                    <strong>The Future of CSS Grid</strong><br>
                    <span style="font-size: 0.8rem; color: #64748b;">Published on Oct 24</span>
                </td>
                <td>Ahmed K.</td>
                <td><span class="tag" style="font-size: 0.7rem;">Technology</span></td>
                <td><span style="color: green; font-weight: bold;">● Live</span></td>
                <td>
                    <a href="#" class="btn btn-outline btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Draft: Laravel 11 Features</strong><br>
                    <span style="font-size: 0.8rem; color: #64748b;">Last edited 2 mins ago</span>
                </td>
                <td>Sarah J.</td>
                <td><span class="tag" style="font-size: 0.7rem;">Coding</span></td>
                <td><span style="color: orange; font-weight: bold;">● Draft</span></td>
                <td>
                    <a href="#" class="btn btn-outline btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection