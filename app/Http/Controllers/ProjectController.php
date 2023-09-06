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
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn-sm"><i class="fa-solid editProject fa-pencil"></i></a>';

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
                'project_name' => 'required',
                'status' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'productivity' => 'required|numeric',

            ]);
            if($validateUser->fails()){
                return back();
            }
            if ($request->id) {
                Project::where('id', $request->id)->update([
                    'project_name' => $request->project_name,
                    'project_status' => $request->status,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'productivity' => $request->productivity,]);
                Toastr::success('Success! Project Updated successfully');
                return back();
            } else {
                // Create a new project
                Project::create([
                        'project_name' => $request->project_name,
                        'project_status' => $request->status,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'productivity' => $request->productivity,
                    ]);
                    Toastr::success('Success! Project Inserted Successfully');
                    return back();
            }
        } catch (\Throwable $th) {
            return back();
        }
    }
    public function edit(string $id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    public function destroy($id)
    {
        Project::find($id)->delete();
        Toastr::success('Success! Project Deleted Successfully');
    }

}
