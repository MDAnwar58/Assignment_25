<?php

namespace App\Http\Controllers;

use App\Mail\LeaveRequestStatus;
use App\Models\LeaveCategory;
use App\Models\LeaveRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class LeaveRequestController extends Controller
{
    function index()
    {
        $leave_requests = LeaveRequest::latest()->paginate(5);
        return view('pages.leave-request.index', compact('leave_requests'));
    }
    function create()
    {
        $users = User::latest()->get();
        $leave_categories = LeaveCategory::latest()->get();
        return view('pages.leave-request.create', compact('users', 'leave_categories'));
    }
    function store(Request $request)
    {
        $currentDate = date('Y-m-d');
        if ($currentDate <= $request->start_date && $currentDate <= $request->end_date) {
            $request->validate([
                'employee_id' => 'required',
                'leave_category_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'reason' => 'required'
            ]);

            LeaveRequest::create([
                'employee_id' => $request->employee_id,
                'leave_category_id' => $request->leave_category_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'reason' => $request->reason,
            ]);

            return redirect()->route('admin.leave_request')->with('success', 'Leave Request Added Successfully!');
        } else {
            return redirect()->route('admin.leave_request.create')->with('error', 'Please Check Leave Request StartDate And EndDate');
        }

    }
    function approveOrReject(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::find($id);
        $leaveRequest_id = $leaveRequest->id;
        if ($request->input('reject')) {
            $leaveRequest->status = $request->input('reject');
            if ($leaveRequest->save()) {
                $leaveRequestStatus = $leaveRequest->status;
                Mail::to($leaveRequest->employee->email)->send(new LeaveRequestStatus($leaveRequestStatus));
                return redirect()->route('admin.leave_request.show', $leaveRequest_id)->with('error', 'Leave Request Rejected!');
            }
        } else if ($request->input('approve')) {
            $leaveRequest->status = $request->input('approve');
            if ($leaveRequest->save()) {
                $leaveRequestStatus = $leaveRequest->status;
                Mail::to($leaveRequest->employee->email)->send(new LeaveRequestStatus($leaveRequestStatus));
                return redirect()->route('admin.leave_request.show', $leaveRequest_id)->with('success', 'Leave Request Approved!');
            }
        }
    }
    function show($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        $users = User::latest()->get();
        $leave_categories = LeaveCategory::latest()->get();
        return view('pages.leave-request.show', compact('leaveRequest', 'users', 'leave_categories'));
    }

    function edit($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        $users = User::latest()->get();
        $leave_categories = LeaveCategory::latest()->get();
        return view('pages.leave-request.edit', compact('leaveRequest', 'users', 'leave_categories'));
    }
    function update(Request $request, $id)
    {
        $currentDate = date('Y-m-d');
        if ($currentDate <= $request->start_date && $currentDate <= $request->end_date) {
            $request->validate([
                'employee_id' => 'required',
                'leave_category_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'reason' => 'required'
            ]);

            LeaveRequest::find($id)->update([
                'employee_id' => $request->employee_id,
                'leave_category_id' => $request->leave_category_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'reason' => $request->reason,
            ]);

            return redirect()->route('admin.leave_request')->with('success', 'Leave Request Updated Successfully!');
        } else {
            return redirect()->route('admin.leave_request.edit', $id)->with('error', 'Please Check Leave Request StartDate And EndDate');
        }
    }
    function destroy($id)
    {
        LeaveRequest::find($id)->delete();
        return redirect()->back()->with('success', 'Leave Request Deleted Successfully!');
    }
}