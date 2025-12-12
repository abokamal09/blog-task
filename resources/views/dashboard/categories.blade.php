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
                    <td>{{ $category->posts_count ?? 0 }}</td>
                    <td>
                        <button onclick="openEditCategoryModal(this)"
                            data-id="{{ $category->id }}"
                            data-name="{{ $category->name }}"
                            data-slug="{{ $category->slug }}"
                            class="btn btn-outline btn-sm">
                            Edit
                        </button>

                        <button onclick="openDeleteCategoryModal(this)"
                            data-id="{{ $category->id }}"
                            class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </td>
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
                <input type="text" class="form-control" placeholder="e.g. Health" name="name" required>
            </div>

            <div class="form-group">
                <label class="form-label">Slug (Optional)</label>
                <input type="text" class="form-control" placeholder="e.g. health" name="slug">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save Category</button>
        </form>
    </div>

</div>



{{-- ---------------- EDIT MODAL ---------------- --}}
<div id="editCategoryModal" class="modal-overlay">
    <div class="modal-window">
        <div class="modal-header">
            <h5 class="modal-title">Edit Category</h5>
            <button type="button" onclick="closeModal('editCategoryModal')" class="modal-close">&times;</button>
        </div>

        <div class="modal-body">
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" id="editCategoryId" name="category_id">

                <div class="form-group">
                    <label class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" id="editCategoryName" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="editCategorySlug">
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" onclick="closeModal('editCategoryModal')" class="btn btn-outline">Cancel</button>
            <button type="submit" form="editCategoryForm" class="btn btn-primary">Update Category</button>
        </div>
    </div>
</div>



{{-- ---------------- DELETE MODAL ---------------- --}}
<div id="deleteCategoryModal" class="modal-overlay">
    <div class="modal-window" style="max-width: 400px;">
        <div class="modal-header" style="background: var(--accent-color);">
            <h5 class="modal-title">Confirm Deletion</h5>
            <button type="button" onclick="closeModal('deleteCategoryModal')" class="modal-close">&times;</button>
        </div>

        <div class="modal-body">
            <p style="font-size: 1.1rem;">Are you sure you want to delete this category?</p>

            <form id="deleteCategoryForm" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" onclick="closeModal('deleteCategoryModal')" class="btn btn-outline">Cancel</button>
            <button type="submit" form="deleteCategoryForm" class="btn btn-danger">Confirm Delete</button>
        </div>
    </div>
</div>



<script>
    // -------- OPEN EDIT MODAL --------
    function openEditCategoryModal(button) {
        const modal = document.getElementById('editCategoryModal');
        const form = document.getElementById('editCategoryForm');

        const id = button.dataset.id;
        const name = button.dataset.name;
        const slug = button.dataset.slug;

        // Fill inputs
        document.getElementById('editCategoryId').value = id;
        document.getElementById('editCategoryName').value = name;
        document.getElementById('editCategorySlug').value = slug;

        // Set form action dynamically
        const urlTemplate = "{{ route('dashboard.categories.update', ['category' => 'CAT_ID']) }}";
        form.action = urlTemplate.replace('CAT_ID', id);

        modal.classList.add('active');
    }


    // -------- OPEN DELETE MODAL --------
    function openDeleteCategoryModal(button) {
        const modal = document.getElementById('deleteCategoryModal');
        const form = document.getElementById('deleteCategoryForm');

        const id = button.dataset.id;

        const urlTemplate = "{{ route('dashboard.categories.destroy', ['category' => 'CAT_ID']) }}";
        form.action = urlTemplate.replace('CAT_ID', id);

        modal.classList.add('active');
    }



    function closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
    }
</script>

@endsection
