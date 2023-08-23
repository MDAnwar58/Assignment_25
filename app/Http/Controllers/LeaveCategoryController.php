<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategories;
use App\Models\LeaveCategory;
use Illuminate\Http\Request;

class LeaveCategoryController extends Controller
{
    function index()
    {
        $leave_categories = LeaveCategory::latest()->paginate(3);
        return view('pages.leave-category.index', compact('leave_categories'));
    }
    function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|unique:leave_categories',
        ]);

        LeaveCategory::create($request->all());

        return redirect()->back()->with('success', 'Leave Category Added Successfully');
    }
    function edit($id) 
    {
        $leaveCategory = LeaveCategory::find($id);
        return view('pages.leave-category.edit', compact('leaveCategory'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        LeaveCategory::find($id)->update($request->all());

        return redirect()->route('admin.leave_category')->with('success', 'Leave Category Updated Successfully');
    }
    function destroy($id)
    {
        LeaveCategory::find($id)->delete();
        return redirect()->back()->with('success', 'Leave Category Deleted Successfully');
    }
}
