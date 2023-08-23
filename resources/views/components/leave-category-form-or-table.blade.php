<div class="row pt-4">
    <form action="{{ route('admin.leave_category.store') }}" method="POST" class="col-md-4">
        @csrf
        <div class="card">
            <h4 class="card-header text-center">Leave Category Add</h4>
            <div class="card-body">
                <label for="name">Category</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <button type="submit" class="btn btn-sm btn-dark w-100 mt-2">Save</button>
            </div>
        </div>
    </form>
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header text-center">Leave Category List</h4>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($leave_categories->count() > 0)
                                @foreach ($leave_categories as $leave_category)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $leave_category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.leave_category.edit', $leave_category->id) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <form action="{{ route('admin.leave_category.destroy', $leave_category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Leave Category not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
