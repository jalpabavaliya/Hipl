<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
use Auth;
class LoginHistoryController extends Controller
{
    public function index()
    {
      
        //  $a=Auth::user()->id;
        $a=Auth::user()->first_name;
        
       
        return view('admin.loginHistory.index');
    }

    public function getLoginHistory(Request $request){

        if ($request->ajax()) {
            // $data = LoginHistory::with('user')->latest()->get();
            $data = LoginHistory::with('user')->latest()->get();
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
    public function storelogin(Request $request){
     
        // $data = $request->input();
        // $ins = array(
        //     'user_id' => $data['user_id'] ? $data['user_id'] : '0',
        //     'login_status' => $data['login_status'] ? $data['login_status'] : 'N/A',
        // );

        // if (!empty($data['login_status'])) {
        //     LoginHistory::where('id', $data['login_status'])->update($ins);
        //     Toastr::success('Success! Salary Updated');
        //     return back();
        // } else {
        //     LoginHistory::create($ins)->id;
        //     Toastr::success('Success!  Inserted');
        //     return back();
        // }

    }

}
