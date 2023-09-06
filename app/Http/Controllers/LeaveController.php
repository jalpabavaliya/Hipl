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
                    $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-toggle="tooltip" class="editLeave" data-id="'.$row->id.'"><i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a><a href="javascript:void(0)" data-toggle="tooltip" class="deleteLeave" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request){

        $data = $request->input();

        $dates = explode('-',$request->dates);
        $fromDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : '';
        $toDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : '';

        $ins = array(
            'start_date' => $fromDate,
            'end_date' =>  $toDate,
            'leave_type' => $request->leave_type,
            'leave_reason' => $data['leave_reason'] ? $data['leave_reason'] : 'N/A',
        );

        if (!empty($data['leave_id'])) {
            Leave::where('id', $data['leave_id'])->update([
                'start_date' => $fromDate,
                'end_date' =>  $toDate,
                'leave_type' => $request->leave_type,
                'leave_reason' => $data['leave_reason'] ? $data['leave_reason'] : 'N/A',
            ]);
            Toastr::success('Success! Leave Updated');

            return back();
        } else {
            Leave::create($ins)->id;

            Toastr::success('Success! Leave Inserted');
            return back();
        }
    }

    public function edit($l_id)
    {
        $leave = Leave::where('id', $l_id)->orderBy('id', 'DESC')->first();

        $join =  [$leave->start_date, $leave->end_date];

        $leave->date = implode(' - ', array_values($join)); 
        return response()->json($leave);
    }

    public function destroy($id)
    {
        Leave::find($id)->delete();
        Toastr::success('Success! Leave Deleted Successfully');
    }
}
