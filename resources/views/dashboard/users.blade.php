@extends('layouts.dashboard')

@section('title', 'Manage Users')
@section('dash-title', 'Users Registry')

@section('dash-content')

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $totalUsers }}</div>
        <div class="stat-label">Total Users</div>
    </div>
    <div class="stat-card" style="border-top-color: var(--accent-color);">
        <div class="stat-number">{{ $adminCount }}</div>
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
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><strong>{{ $user->name }}</strong></td>
                <td>{{ $user->email }}</td>
                <td><span class="badge badge-admin">
                        @if( $user->is_admin )
                        Admin
                        @else
                        Reader
                        @endif
                    </span></td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="#" onclick="openEditUserModal(this)"
                        data-id="{{ $user->id }}"
                        data-name="{{ e($user->name) }}"
                        data-email="{{ e($user->email) }}"
                        data-role="{{ $user->is_admin ? 'admin' : 'user' }}" class="btn btn-outline btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="margin-top: 1.5rem;">
</div>


<div id="editUserModal" class="modal-overlay">
    <div class="modal-window">

        <div class="modal-header">
            <h5 class="modal-title">Edit User Record</h5>
            <button type="button" onclick="closeModal('editUserModal')" class="modal-close">&times;</button>
        </div>

        <div class="modal-body">
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" id="editUserId">

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="editUserName">
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" id="editUserEmail">
                </div>

                <div class="form-group">
                    <label class="form-label">Role</label>
                    <select class="form-control" name="role" id="editUserRole">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" onclick="closeModal('editUserModal')" class="btn btn-outline">Cancel</button>
            <button type="submit" form="editUserForm" class="btn btn-primary">Save Changes</button>
        </div>

    </div>
</div>

<script>
    function openEditUserModal(button) {
        const modal = document.getElementById('editUserModal');
        const form = document.getElementById('editUserForm');

        const idInput = document.getElementById('editUserId');
        const nameInput = document.getElementById('editUserName');
        const emailInput = document.getElementById('editUserEmail');
        const roleSelect = document.getElementById('editUserRole');

        const userId = button.dataset.id;
        const userName = button.dataset.name;
        const userEmail = button.dataset.email;
        const userRole = button.dataset.role;


        idInput.value = userId;
        nameInput.value = userName;
        emailInput.value = userEmail;
        roleSelect.value = userRole;



        const urlTemplate = "{{ route('dashboard.users.update', ['user' => 'USER_ID_PLACEHOLDER']) }}";
        form.action = urlTemplate.replace('USER_ID_PLACEHOLDER', userId);

        modal.classList.add('active');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            event.target.classList.remove('active');
        }
    }
</script>

@endsection