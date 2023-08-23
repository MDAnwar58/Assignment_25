<div class="row pt-4 justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-header text-center">Leave Request Show</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="py-2">
                            <span>Employee: {{ $leaveRequest->employee->name }}</span>
                        </div>
                        <div class="py-2">
                            <span>Leave Category: {{ $leaveRequest->leaveCategory->name }}</span>
                        </div>
                        <div class="py-2">
                            <span>Difference Of Leave Days:
                                @php
                                    $start = new DateTime(date('Y-m-d', strtotime($leaveRequest->start_date))); // May 1, 2023
                                    $end = new DateTime(date('Y-m-d', strtotime($leaveRequest->end_date))); // May 10, 2023
                                    
                                    $interval = $start->diff($end);
                                    $daysDifference = $interval->days;
                                @endphp
                                {{ $daysDifference }}
                            </span>
                        </div>
                        <div class="py-2">
                            <span>Leave Status:
                                @if ($leaveRequest->status == 'pending')
                                    <span class=" text-warning">{{ $leaveRequest->status }}</span>
                                @elseif ($leaveRequest->status == 'reject')
                                    <span class=" text-danger">{{ $leaveRequest->status }}</span>
                                @else
                                    <span class=" text-success">{{ $leaveRequest->status }}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="py-2">
                            <span>Start Date: {{ date('d F, Y', strtotime($leaveRequest->start_date)) }}</span>
                        </div>
                        <div class="py-2">
                            <span>End Date: {{ date('d F, Y', strtotime($leaveRequest->end_date)) }}</span>
                        </div>
                        @if ($leaveRequest->status == 'pending')
                            <div class="py-2">
                                <span class="d-flex justify-content-start">
                                    <span>Approve/Reject:</span>
                                    <span class="ms-2">
                                        <form
                                            action="{{ route('admin.leave_request.approveOrReject', $leaveRequest->id) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="reject" value="reject">
                                            <button type="submit"
                                                class="badge bg-danger btn btn-sm text-decoration-none">reject</button>
                                        </form>
                                        <form
                                            action="{{ route('admin.leave_request.approveOrReject', $leaveRequest->id) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="approve" value="approve">
                                            <button type="submit"
                                                class="badge bg-success btn btn-sm text-decoration-none">approve</button>
                                        </form>
                                    </span>
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="py-2">
                            <span class="h5">Reason:</span>
                            <p>{{ $leaveRequest->reason }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
