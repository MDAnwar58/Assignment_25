<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveBalanceController extends Controller
{
    function index() 
    {
        $leave_approve_requests = LeaveRequest::where('status', 'approve')->latest()->paginate(5);
        return view('pages.leave-balance.index', compact('leave_approve_requests'));
    }
}
