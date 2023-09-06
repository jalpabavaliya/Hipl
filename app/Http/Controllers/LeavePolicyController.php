<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class LeavePolicyController extends Controller
{
    public function index()
    {
        $policy = Policy::where('id','1')->first();
        return view('admin.leavePolicy.index', compact('policy'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $ins = array(
            'detail' => $data['detail'] ? $data['detail'] : 'N/A',
        );
        $policy = Policy::where('id',1)->first();
        if (isset($policy->id)) {
            Policy::where('id',1)->update($ins);
            Toastr::success('Success! Policy Updated');
            return back();
        } else {
            Policy::create($ins)->id;

            Toastr::success('Success! Policy Inserted');
            return back();
        }
    }
}
