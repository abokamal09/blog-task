<?php $__env->startSection('title', 'Manage Users'); ?>
<?php $__env->startSection('dash-title', 'Users Registry'); ?>

<?php $__env->startSection('dash-content'); ?>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number"><?php echo e($totalUsers); ?></div>
        <div class="stat-label">Total Users</div>
    </div>
    <div class="stat-card" style="border-top-color: var(--accent-color);">
        <div class="stat-number"><?php echo e($adminCount); ?></div>
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
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><strong><?php echo e($user->name); ?></strong></td>
                <td><?php echo e($user->email); ?></td>
                <td>
                    <span class="badge badge-admin">
                        <?php echo e($user->is_admin ? 'Admin' : 'Reader'); ?>

                    </span>
                </td>
                <td><?php echo e($user->created_at->format('M d, Y')); ?></td>
                <td>
                    <button onclick="openEditUserModal(this)"
                        data-id="<?php echo e($user->id); ?>"
                        data-name="<?php echo e($user->name); ?>"
                        data-email="<?php echo e($user->email); ?>"
                        data-role="<?php echo e($user->is_admin ? 'admin' : 'user'); ?>"
                        class="btn btn-outline btn-sm">
                        Edit
                    </button>

                    <button onclick="openDeleteModal(this)"
                        data-id="<?php echo e($user->id); ?>"
                        class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="user_id" id="editUserId">

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="editUserName" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" id="editUserEmail" required>
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

<div id="deleteUserModal" class="modal-overlay">
    <div class="modal-window" style="max-width: 400px;">
        <div class="modal-header" style="background: var(--accent-color);">
            <h5 class="modal-title">Confirm Deletion</h5>
            <button type="button" onclick="closeModal('deleteUserModal')" class="modal-close">&times;</button>
        </div>

        <div class="modal-body">
            <p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 1rem;">
                Are you sure you want to delete this user?
            </p>
            <p style="font-size: 0.9rem; color: #64748b;">
                This action cannot be undone. The user will be permanently removed from the database.
            </p>

            <form id="deleteUserForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" onclick="closeModal('deleteUserModal')" class="btn btn-outline">Cancel</button>
            <button type="submit" form="deleteUserForm" class="btn btn-danger" style="background: var(--accent-color); color: #fff;">
                Confirm Delete
            </button>
        </div>

    </div>
</div>

<script>
    function openEditUserModal(button) {
        const modal = document.getElementById('editUserModal');
        const form = document.getElementById('editUserForm');


        const userId = button.dataset.id;
        const userName = button.dataset.name;
        const userEmail = button.dataset.email;
        const userRole = button.dataset.role;


        document.getElementById('editUserId').value = userId;
        document.getElementById('editUserName').value = userName;
        document.getElementById('editUserEmail').value = userEmail;
        document.getElementById('editUserRole').value = userRole;



        const urlTemplate = "<?php echo e(route('dashboard.users.update', ['user' => 'USER_ID_PLACEHOLDER'])); ?>";
        form.action = urlTemplate.replace('USER_ID_PLACEHOLDER', userId);

        modal.classList.add('active');
    }


    function openDeleteModal(button) {
        const modal = document.getElementById('deleteUserModal');
        const form = document.getElementById('deleteUserForm');
        const userId = button.dataset.id;


        const urlTemplate = "<?php echo e(route('dashboard.users.destroy', ['user' => 'USER_ID_PLACEHOLDER'])); ?>";
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\task-baup\blog-task\resources\views/dashboard/users.blade.php ENDPATH**/ ?>