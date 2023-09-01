<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.project.index');
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

    // public function store(Request $request){
    //     try {
    //         $validateUser = Validator::make($request->all(), 
    //         [
    //             'name' => 'required',
    //         ]);
    //         if($validateUser->fails()){
    //                 return response()->json([
    //                     'message' => 'validation error',
    //                     'errors' => $validateUser->errors()
    //                 ], 401);
    //         }
        
    //         $user = User::where('mobile_no', $request->mobile_no)->first();

    //         return response()->json([            
    //             'message' => 'User Logged In Successfully',
    //             'token' => $user->createToken('authToken')->plainTextToken
    //         ], 200);

    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $th->getMessage()
    //         ], 500);
    //     }
    // }
}
