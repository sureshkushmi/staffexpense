<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'attendance', // Add this line to include the 'attendance' field
        'location_office',
        'out_station',
        'work_completed',
        'work_completed_remark',
        'work_pending',
        'work_pending_remark',
        'expense1',
        'expense2',
        'expense3',
        'expense4',
        'expense5',
        'bike_expense',
        'approved_expense',
    ];
}
