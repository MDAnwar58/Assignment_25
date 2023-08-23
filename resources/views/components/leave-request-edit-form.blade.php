<div class="row pt-4 justify-content-center">
    <form action="{{ route('admin.leave_request.update', $leaveRequest->id) }}" method="POST" class="col-md-8">
        @csrf
        @method('PUT')
        <div class="card">
            <h4 class="card-header text-center">Leave Request Update</h4>
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
                                <option {{ $leaveRequest->employee_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <label for="leave_category_id">Leave Category</label>
                        <select name="leave_category_id" class="form-control">
                            <option value="">(Select Leave Category)</option>
                            @foreach ($leave_categories as $leave_category)
                                <option {{ $leaveRequest->leave_category_id == $leave_category->id ? 'selected' : '' }} value="{{ $leave_category->id }}">{{ $leave_category->name }}</option>
                            @endforeach
                        </select>
                        @error('leave_category_id')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <label for="reason">Reason</label>
                        <textarea name="reason" rows="4" class="form-control">{{ $leaveRequest->reason }}</textarea>
                        @error('reason')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $leaveRequest->start_date }}">
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $leaveRequest->end_date }}">
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <button type="submit" class="btn btn-sm btn-dark w-100 mt-2">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>