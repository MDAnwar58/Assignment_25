<div class="row pt-4 justify-content-center">
    <form action="{{ route('admin.leave_request.store') }}" method="POST" class="col-md-8">
        @csrf
        <div class="card">
            <h4 class="card-header text-center">Leave Request Added</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="employee_id">Employee</label>
                        <select name="employee_id" class="form-control">
                            <option value="">(Select Employee)</option>
                            @foreach ($users as $user)
                                @if ($user->id == Auth::user()->id)
                                    @continue
                                @endif
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <label for="leave_category_id">Leave Category</label>
                        <select name="leave_category_id" class="form-control">
                            <option value="">(Select Leave Category)</option>
                            @foreach ($leave_categories as $leave_category)
                                <option value="{{ $leave_category->id }}">{{ $leave_category->name }}</option>
                            @endforeach
                        </select>
                        @error('leave_category_id')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <label for="reason">Reason</label>
                        <textarea name="reason" rows="4" class="form-control"></textarea>
                        @error('reason')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" class="form-control">
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <button type="submit" class="btn btn-sm btn-dark w-100 mt-2">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
