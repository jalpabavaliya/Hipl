<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CasualLeave;

class CasualLeaveController extends Controller
{
    public function index()
    {
        $data = CasualLeave::where('id',1)->first();
        return view('admin.casualLeave.index',compact('data'));
    }

    public function store(Request $request){
        $leave = isset($request->leave) ? $request->leave : 0 ;
        $res = CasualLeave::where('id',1)->update(['number_of_leave' => $leave]);
            return redirect('casual-leave');
    }
}
