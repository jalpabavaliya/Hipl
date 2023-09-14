<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginHistory;
use Carbon\Carbon;
use DB;
use Session;
class AuthController extends Controller
{
    public function login()
    {
        return view('welcome');
    }
    public function store(Request $request)
    {   
        // dd('hello');
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $person = LoginHistory::create([
               
                'user_id' =>Auth::id(),
                'login_time'=>Carbon::now(),
                'login_status'=>0,
                'created_at' => Carbon::now(),
            ]);
            Toastr::info('Success! Logged In');
            return redirect('dashboard');
        }
        else{
            Toastr::error('Error! Invalid email or password');
            // return redirect()->back();
            return back();
        }
    }

    public function logout(Request $request)
    {

        $personlogout = DB::table('daily_login_master')->where('id', Auth::id())->update([
            'login_status'=>1,
            // 'logout_time' =>Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
       
        auth()->logout();
        $request->session()->invalidate();
        Toastr::info('Success! Logged Out');
        return redirect('/');
    }
}
