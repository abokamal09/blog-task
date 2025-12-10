@extends('layouts.dashboard')

@section('title', 'Manage Users')
@section('dash-title', 'Users Registry')

@section('dash-content')

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">1,240</div>
        <div class="stat-label">Total Users</div>
    </div>
    <div class="stat-card" style="border-top-color: var(--accent-color);">
        <div class="stat-number">5</div>
        <div class="stat-label">Admins</div>
    </div>
</div>

<div class="table-responsive">
    <table class="ledger-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Role</th>
                <th>Joined Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#101</td>
                <td><strong>Ahmed Kamal</strong></td>
                <td>ahmed@example.com</td>
                <td><span class="badge badge-admin">Admin</span></td>
                <td>Oct 24, 2023</td>
                <td>
                    <a href="#" onclick="openModal('editUserModal')" class="btn btn-outline btn-sm">Edit</a>
                </td>
            </tr>
            <tr>
                <td>#102</td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td><span class="badge badge-user">Reader</span></td>
                <td>Nov 01, 2023</td>
                <td>
                    <a href="#" onclick="openModal('editUserModal')" class="btn btn-outline btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm">Ban</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div style="margin-top: 1.5rem;">
</div>


<div id="editUserModal" class="modal-overlay">
    <div class="modal-window">

        <div class="modal-header">
            <h5 class="modal-title">Edit User Record</h5>
            <button onclick="closeModal('editUserModal')" class="modal-close">&times;</button>
        </div>

        <div class="modal-body">
            <form id="editUserForm">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="Ahmed Kamal">
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" value="ahmed@example.com">
                </div>

                <div class="form-group">
                    <label class="form-label">Role</label>
                    <select class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="editor">Editor</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button onclick="closeModal('editUserModal')" class="btn btn-outline">Cancel</button>
            <button type="submit" form="editUserForm" class="btn btn-primary">Save Changes</button>
        </div>

    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }

    // Optional: Close if clicking outside the window
    window.onclick = function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            event.target.classList.remove('active');
        }
    }
</script>

@endsection