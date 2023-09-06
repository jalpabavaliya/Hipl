<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('welcome');
    }
    public function store(Request $request)
    {   

        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            Toastr::info('Success! Logged In');
            return redirect('dashboard');
        }else{
            Toastr::error('Error! Invalid email or password');
            // return redirect()->back();
            return back();
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        Toastr::info('Success! Logged Out');
        return redirect('/');
    }
}
