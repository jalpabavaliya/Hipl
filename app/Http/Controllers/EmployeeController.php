<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }

    public function getEmployee(Request $request){
        if ($request->ajax()) {
            $data = User::latest()->get();
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
                'empcode' => 'required',
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'mno' => 'required',
                'email' => 'required',
                'b_date' => 'required',
                'department' => 'required',
                'joining_date' => 'required',
                'password' => 'required',
                'address' => 'required',
            ]);
            if($validateUser->fails()){
                return back();
            }
            Department::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'emp_code' => $request->empcode,
                'mno' => $request->mno,
                'mobile' => $request->mno,
                'birth_date' => $request->b_date,
                'dept' => 1,
                'date_of_joining' => $request->joining_date,
                'address' => $request->address,
                'password' =>  Hash::make($request->password),
            ]);
            Toastr::info('Success! Deparment Save Successfully');
            return back();
        } catch (\Throwable $th) {
            return back();
        }    
    }

}
