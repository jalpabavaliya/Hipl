<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;

class LeaveController extends Controller
{
    public function index()
    {
        return view('admin.department.index');
    }

    public function getLeave(Request $request){

        if ($request->ajax()) {
            $data = Leave::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i><i class="fa-solid fa-trash"></i>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request){
        try {
            $validateUser = Validator::make($request->all(), [
                'dates' => 'required',
                'leave_type' => 'required',
                'leave_reason' => 'required',
            ]);
            if($validateUser->fails()){
                return back();
            }
            $dates = explode('-',$request->dates);
            $fromDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : '';
            $toDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : '';
            Leave::create([
                'leave_type' => $request->leave_type,
                'start_date' => $fromDate,
                'end_date' =>  $toDate,
                'leave_reason' => $request->leave_reason,
                'number_of_leave' => $request->leave_type,
            ]);
            Toastr::info('Success! Leave Save Successfully');
            return back();
        } catch (\Throwable $th) {
            return back();
        }
    }
}
