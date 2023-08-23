@extends('layouts.app')
@section('title', 'Dashboard')


@section('content')
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card card-body text-center">
                <h6>Employee</h6>
                <h4>
                    @if ($users->count() > 0)
                        {{ $users->count() }}
                    @else
                        0
                    @endif
                </h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body text-center">
                <h6>Leave Request</h6>
                <h4>
                    @if ($leave_requests->count() > 0)
                        {{ $leave_requests->count() }}
                    @else
                        0
                    @endif
                </h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body text-center">
                <h6>Leave Approve</h6>
                <h4>
                    @if ($leave_approves->count() > 0)
                        {{ $leave_approves->count() }}
                    @else
                        0
                    @endif
                </h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body text-center">
                <h6>Leave Reject</h6>
                <h4>
                    @if ($leave_rejects->count() > 0)
                        {{ $leave_rejects->count() }}
                    @else
                        0
                    @endif
                </h4>
            </div>
        </div>
    </div>
@endsection
