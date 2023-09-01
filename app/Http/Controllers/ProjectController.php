<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;
use Validator;
use Brian2694\Toastr\Facades\Toastr;

class ProjectController extends Controller
{
    public function index()
    {
        $date = now()->format('d-m-y');
        return view('admin.project.index', compact('date'));
    }

    public function getProject(Request $request){

        if ($request->ajax()) {
            $data = Project::latest()->get();
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
        try {
            $validateUser = Validator::make($request->all(), [
                'project_name' => 'required',
                'status' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'productivity' => 'required|numeric',

            ]);
            if($validateUser->fails()){
                return back();
            }
            Project::create([
                'project_name' => $request->project_name,
                'project_status' => $request->status,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'productivity' => $request->productivity,
            ]);
            Toastr::info('Success! Project Save Successfully');
            return back();
        } catch (\Throwable $th) {
            return back();
        }    
    }
}
