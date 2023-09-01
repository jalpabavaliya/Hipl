<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project_master';
    protected $fillable = [
        'project_name',
        'project_status',
        'productivity',
        'start_date',
        'end_date',
    ];

}
