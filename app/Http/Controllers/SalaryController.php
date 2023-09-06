<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use Validator;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;

class SalaryController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.salary.index', compact('users'));
    }

    public function getSalary(Request $request){

        if ($request->ajax()) {
            $data = Salary::with('user')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-toggle="tooltip" class="editSalary" data-id="'.$row->id.'"><i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a><a href="javascript:void(0)" data-toggle="tooltip" class="deleteSalary" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></a>';                 
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $ins = array(
            'user_id' => $data['user_id'] ? $data['user_id'] : '0',
            'salary' => $data['salary'] ? $data['salary'] : 'N/A',
        );

        if (!empty($data['salary_id'])) {
            Salary::where('id', $data['salary_id'])->update($ins);
            Toastr::success('Success! Salary Updated');
            return back();
        } else {
            Salary::create($ins)->id;
            Toastr::success('Success! Salary Inserted');
            return back();
        }
    }

    public function edit($s_id)
    {
        $salarys = Salary::where('id', $s_id)->orderBy('id', 'DESC')->first();
        return response()->json($salarys);
    }
    
    public function destroy($id)
    {
        Salary::find($id)->delete();
        Toastr::success('Success! Salary Deleted Successfully');
    }
}
