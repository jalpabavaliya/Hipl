<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

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

    public function store(Request $request)
    {

        // $data = $request->input();
        // $ins = array(
        //     'first_name' => $data['first_name'] ? $data['first_name'] : 'N/A',
        //     'middle_name' => $data['middle_name'] ? $data['middle_name'] : 'N/A',
        //     'last_name' => $data['last_name'] ? $data['last_name'] : 'N/A',
        //     'emp_code' => $data['empcode'] ? $data['empcode'] : 'N/A',
        //     'mobile' => $data['mno'] ? $data['mno'] : 'N/A',
        //     'birth_date' => $data['b_date'] ? $data['b_date'] : 'N/A',
        //     'dept' => $data['department'] ? $data['department'] : 'N/A',
        //     'date_of_joining' => $data['joining_date'] ? $data['joining_date'] : 'N/A',
        //     'address' => $data['address'] ? $data['address'] : 'N/A',
        //     'email' => $data['email'] ? $data['email'] : 'N/A',
        //     'password' =>  Hash::make($data['password']),
        // );

        // if (!empty($data['emp_id'])) {
        //     User::where('id', $data['emp_id'])->update($ins);
        //     Toastr::success('Success! User Updated');

        //     return back();
        // } else {
        //     User::create($ins)->id;

        //     Toastr::success('Success! User Inserted');
        //     return view('admin.employee.index');
        // }

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
            $user = User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'emp_code' => $request->empcode,
                'mobile' => $request->mno,
                'birth_date' => $request->b_date,
                'dept' => $request->department,
                'date_of_joining' => $request->joining_date,
                'address' => $request->address,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
            ]);


            dd($user);
            Toastr::info('Success! User Save Successfully');
            return redirect('admin.employee.index');
        } catch (\Throwable $th) {
            return back();
        }    
    }

}
