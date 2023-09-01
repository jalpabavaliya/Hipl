<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.department.index');
    }

    public function getDepartment(Request $request){

        if ($request->ajax()) {
            $data = Department::latest()->get();
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
                'name' => 'required',
            ]);
            if($validateUser->fails()){
                return back();
            }
            Department::create([
                'name' => $request->name,
            ]);
            return back();
        } catch (\Throwable $th) {
            return back();
        }    
    }

}
