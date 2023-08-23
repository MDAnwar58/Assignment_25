<div class="row pt-4">
    <div class="col-md-12 mb-5">
        <div class="card">
            <h4 class="card-header text-center">
                <span class=" text-success">Leave Approve List</span>
            </h4>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>Leave Category</th>
                                <th class="text-center">Difference Leave Days</th>
                                <th class="text-center">Left Days</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($leave_approve_requests->count() > 0)
                                @foreach ($leave_approve_requests as $leave_approve_request)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $leave_approve_request->employee->name }}</td>
                                        <td>{{ $leave_approve_request->leaveCategory->name }}</td>
                                        <td class="text-center">
                                            @php
                                                $start = new DateTime(date('Y-m-d', strtotime($leave_approve_request->start_date))); // May 1, 2023
                                                $end = new DateTime(date('Y-m-d', strtotime($leave_approve_request->end_date))); // May 10, 2023
                                                
                                                $interval = $start->diff($end);
                                                $daysDifference = $interval->days;
                                            @endphp
                                            {{ $daysDifference }}
                                        </td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse(date('Y-m-d', strtotime($leave_approve_request->end_date))), false) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.leave_request.show', $leave_approve_request->id) }}"
                                                class="btn btn-sm btn-info">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Leave Category not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class=" d-flex justify-content-center">
                        {{ $leave_approve_requests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
