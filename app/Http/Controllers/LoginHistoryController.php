<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LoginHistoryController extends Controller
{
    public function index()
    {
        return view('admin.loginHistory.index');
    }

    public function getLoginHistory(Request $request){
        if ($request->ajax()) {
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
}
