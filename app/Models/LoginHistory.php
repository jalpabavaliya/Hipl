<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LoginHistory extends Model
{
    use HasFactory;
    protected $table = 'daily_login_master';
    protected $fillable = [
        'user_id',
        'login_status',
        'login_time',
        'logout_time',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
