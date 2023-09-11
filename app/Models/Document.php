<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = "user_documents";
    protected $fillable = [
        'user_id',
        'adhar_card',
        'pan_card',
        'voter_card',
        'standard_10_markshhet',
        'standard_12_markshhet',
    ];
}
