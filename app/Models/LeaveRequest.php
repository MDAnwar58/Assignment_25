<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'leave_category_id',
        'start_date',
        'end_date',
        'reason',
    ];
    function employee()
    {
        return $this->belongsTo(User::class);
    }
    function leaveCategory()
    {
        return $this->belongsTo(LeaveCategory::class);
    }
}