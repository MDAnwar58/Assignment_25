<div class="row pt-4 justify-content-center">
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="col-md-4">
        @csrf
        @method('PUT')
        <div class="card">
            <h4 class="card-header text-center">User Type Update</h4>
            <div class="card-body">
                <label for="name">User Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
                <label for="userType">User Type</label>
                <select name="userType" class="form-control">
                    <option value="">(Select Type)</option>
                    <option {{ $user->userType == 'employee' ? 'selected' : '' }} value="employee">Employee</option>
                </select>
                @error('userType')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <button type="submit" class="btn btn-sm btn-dark w-100 mt-2">Update</button>
            </div>
        </div>
    </form>
</div>
