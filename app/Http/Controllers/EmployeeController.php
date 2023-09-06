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

                    $btn = '<a href="'.route('employee.edit', ['id' => $row->id]).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn-sm"><i class="fa-solid editProject fa-pencil"></i></a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="delete"><i class="fa-solid fa-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'emp_code' => 'required',
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required',
                'email' => 'required|email',
                'birth_date' => 'required|date',
                'dept' => 'required',
                'date_of_joining' => 'required|date',
                'password' => 'required',
                'address' => 'nullable',
            ]);
            if($validateUser->fails()){
                return back();
            }
            User::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'emp_code' => $request->emp_code,
                'mobile' => $request->mobile,
                'birth_date' => $request->birth_date,
                'dept' => $request->dept,
                'date_of_joining' => $request->date_of_joining,
                'address' => $request->address,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
            ]);

            Toastr::success('Success! Employee Saved Successfully');
            return redirect()->route('employee');
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'emp_code' => 'required',
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required',
                'email' => 'required|email',
                'birth_date' => 'required|date',
                'dept' => 'required',
                'date_of_joining' => 'required|date',
                'address' => 'nullable',
            ]);
            if($validateUser->fails()){
                return back();
            }

            $user = User::where('id', $request->id)->update([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'emp_code' => $request->emp_code,
                'mobile' => $request->mobile,
                'birth_date' => $request->birth_date,
                'dept' => $request->dept,
                'date_of_joining' => $request->date_of_joining,
                'address' => $request->address,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),]);
                Toastr::success('Success! Employee Updated Successfully');
            return redirect()->route('employee');
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return back()->with('error', 'Employee not found.');
        }
        return view('admin.employee.create', compact('user'));

    }
    public function destroy($id)
    {
        User::find($id)->delete();
        Toastr::success('Success! User Deleted Successfully');
    }
}
