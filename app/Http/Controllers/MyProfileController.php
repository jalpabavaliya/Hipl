<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class MyProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $departs = Department::get();
        return view('admin.profile.profile', compact('user', 'departs'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $ins = array(
            'emp_code' => $data['emp_code'] ? $data['emp_code'] : 'N/A',
            'first_name' => $data['first_name'] ? $data['first_name'] : 'N/A',
            'middle_name' => $data['middle_name'] ? $data['middle_name'] : 'N/A',
            'last_name' => $data['last_name'] ? $data['last_name'] : 'N/A',
            'mobile' => $data['mobile'] ? $data['mobile'] : 'N/A',
            'email' => $data['email'] ? $data['email'] : 'N/A',
            'dept' => $data['dept'] ? $data['dept'] : '0',
            'birth_date' => $data['birth_date'] ? $data['birth_date'] : null,
            'date_of_joining' => $data['date_of_joining'] ? $data['date_of_joining'] : null,
            'address' => $data['address'] ? $data['address'] : 'N/A',
        );

        if (!empty($data['user_id'])) {
            User::where('id', $data['user_id'])->update($ins);
            Toastr::success('Success! Profile Updated');
            return back();
        } 
    }
}
