<div class="row pt-4">
    <form action="{{ route('admin.user.store') }}" method="POST" class="col-md-4">
        @csrf
        <div class="card">
            <h4 class="card-header text-center">Employee Add</h4>
            <div class="card-body">
                <label for="name">User Name</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <label for="userType">User Type</label>
                <select name="userType" class="form-control">
                    <option value="">(Select Type)</option>
                    <option value="employee">Employee</option>
                </select>
                @error('userType')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-sm btn-dark w-100 mt-2">Save</button>
            </div>
        </div>
    </form>
    <div class="col-md-8">
        <div class="card">
            <h4 class="card-header text-center">Employee List</h4>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() > 0)
                                @foreach ($users as $user)
                                    @if ($user->userType == 'manager')
                                        @continue
                                    @endif
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->userType }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">User not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
