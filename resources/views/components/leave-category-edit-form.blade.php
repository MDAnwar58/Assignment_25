<div class="row pt-4 justify-content-center">
    <form action="{{ route('admin.leave_category.update', $leaveCategory->id) }}" method="POST" class="col-md-4">
        @csrf
        @method('PUT')
        <div class="card">
            <h4 class="card-header text-center">User Type Update</h4>
            <div class="card-body">
                <label for="name">Category</label>
                <input type="text" name="name" class="form-control" value="{{ $leaveCategory->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <button type="submit" class="btn btn-sm btn-dark w-100 mt-2">Update</button>
            </div>
        </div>
    </form>
</div>
