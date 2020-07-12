<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function attemptLogin(Request $request){
        $request->validate([
           'email'=>'required',
           'password' => 'required'
        ]);
        $email = $request['email'];
        $haveEmail = User::where('email',$email)->first();
        if($haveEmail){
            if($haveEmail->status == 1 || $haveEmail->status !=2){
                $request->session()->flash('msg-danger',"Your account not approve yet!");
                return redirect()->back();
            }
        }else{
            $request->session()->flash('msg-danger',"Email not found");
            return redirect()->back();
        }

        $password = bcrypt($request['password']);
        if(Auth::attempt(['email'=>$email,'password'=>$request['password']],true)){
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect($oldUrl);
            }
            return redirect()->route('admin.index');
        }
        Session::flash('msg-danger',"email or password not match!!!");
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('front.login');
    }
}
