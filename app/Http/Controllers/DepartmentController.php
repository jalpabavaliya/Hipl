<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Validator;
use Yajra\DataTables\Facades\DataTables;
use Brian2694\Toastr\Facades\Toastr;

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
                    $actionBtn = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-toggle="tooltip" class="editDepartment" data-id="'.$row->id.'"><i class="fa-solid fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></a><a href="javascript:void(0)" data-toggle="tooltip" class="deleteDepartment" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></a>';
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
            'name' => $data['name'] ? $data['name'] : 'N/A',
        );

        if (!empty($data['department_id'])) {
            Department::where('id', $data['department_id'])->update($ins);
            Toastr::success('Success! Department Updated');

            return back();
        } else {
            Department::create($ins)->id;

            Toastr::success('Success! Department Inserted');
            return back();
        }

        // try {
        //     $validateUser = Validator::make($request->all(), [
        //         'name' => 'required',
        //     ]);
        //     if($validateUser->fails()){
        //         return back();
        //     }
        //     Department::updateOrCreate([
        //         'id' => $request->department_id,
        //     ],
        //     [
        //         'name' => $request->name,
        //     ]);
        //     Toastr::info('Success! Deparment Save Successfully');
        //     return back();
        // } catch (\Throwable $th) {
        //     return back();
        // }

    }

    public function edit($d_id)
    {
        $department = department::where('id', $d_id)->orderBy('id', 'DESC')->first();
        return response()->json($department);
    }

    public function destroy($id)
    {
        Department::find($id)->delete();
        Toastr::success('Success! Deparment Deleted Successfully');
    }
}
