<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
   
    // dd($input['email']);
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
                return redirect('dashboard');

        }else{
            // Toastr::error('Error! Invalid email or password');
            // return redirect()->back();
            return back()->with('failed', 'Failed! User not created');
        }
          
    }
}
