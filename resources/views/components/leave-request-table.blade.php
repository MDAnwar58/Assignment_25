<div class="row pt-4">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header d-flex justify-content-between">
                <span>Leave Request List</span>
                <a href="{{ route('admin.leave_request.create') }}" class="btn btn-sm btn-dark">Create Leave Request</a>
            </h4>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>Leave Category</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Difference Leave Days</th>
                                <th>Reason</th>
                                <th>Leave Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($leave_requests->count() > 0)
                                @foreach ($leave_requests as $leave_request)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $leave_request->employee->name }}</td>
                                        <td>{{ $leave_request->leaveCategory->name }}</td>
                                        <td>{{ date('d F, Y', strtotime($leave_request->start_date)) }}</td>
                                        <td>{{ date('d F, Y', strtotime($leave_request->end_date)) }}</td>
                                        <td>
                                            @php
                                                $start = new DateTime(date('Y-m-d', strtotime($leave_request->start_date))); // May 1, 2023
                                                $end = new DateTime(date('Y-m-d', strtotime($leave_request->end_date))); // May 10, 2023
                                                
                                                $interval = $start->diff($end);
                                                $daysDifference = $interval->days;
                                            @endphp
                                            {{ $daysDifference }}
                                        </td>
                                        <td>{{ Str::limit($leave_request->reason, 20) }}</td>
                                        <td>
                                            @if ($leave_request->status == 'pending')
                                                <span class=" text-warning">{{ $leave_request->status }}</span>
                                            @elseif ($leave_request->status == 'reject')
                                                <span class=" text-danger">{{ $leave_request->status }}</span>
                                            @else
                                                <span class=" text-success">{{ $leave_request->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.leave_request.show', $leave_request->id) }}"
                                                class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('admin.leave_request.edit', $leave_request->id) }}"
                                                class="btn btn-sm btn-success">Edit</a>
                                            <form
                                                action="{{ route('admin.leave_request.destroy', $leave_request->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">Leave Category not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class=" d-flex justify-content-center">
                        {{ $leave_requests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
