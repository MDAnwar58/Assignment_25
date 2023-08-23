<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;

class LeaveReportController extends Controller
{
    function index() 
    {
        $leave_requests = LeaveRequest::where('status', 'reject')->orWhere('status', 'approve')->latest()->paginate(10);
        return view('pages.report.index', compact('leave_requests'));    
    }
}
