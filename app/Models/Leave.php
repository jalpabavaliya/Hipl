<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = "leave_master";
    protected $fillable = [
        'leave_type','start_date','end_date','leave_reason','number_of_leave','balance_leave','taken_leave',
    ];
}
