<div class="row pt-4">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header text-center">
                <span>Leave Report Histories</span>
            </h4>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>Leave Category</th>
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
                                        <td>
                                            @if ($leave_request->status == 'approve')
                                                <span class=" text-success">Approved</span>
                                            @elseif ($leave_request->status == 'reject')
                                                <span class=" text-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.leave_request.show', $leave_request->id) }}"
                                                class="btn btn-sm btn-info">View</a>
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
