<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $leave_requests = LeaveRequest::all();
        $users = User::all();
        $leave_approves = LeaveRequest::where('status', 'approve')->get();
        $leave_rejects = LeaveRequest::where('status', 'reject')->get();
        return view('pages.dashboard.index', compact('users', 'leave_requests', 'leave_approves', 'leave_rejects'));
    }
}
