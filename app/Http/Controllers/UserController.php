<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    public function userPasswordReset($userId){
        $user = User::findOrFail($userId);
        return view('admin.passwordResetByUser',compact('user'));
    }

    public function userPasswordResetPost(Request $request, $userId){
        $request->validate([
            'password' => 'required | min:4 | max:10',
            'reTypePassword' => 'required | min:4 | max:10 | same:password'
        ]);
        $user = User::findOrFail($userId);
        $user->update(['password'=>bcrypt($request['password'])]);
        $request->session()->flash('msg-success','Password updated');
        return redirect()->back();
    }

    public function passwordReset(){
        return view('admin.passwordReset');
    }

    public function passwordResetPost(Request $request){
        $request->validate([
            'password' => 'required | min:4 | max:10',
            'reTypePassword' => 'required | min:4 | max:10 | same:password'
        ]);
        $user = Auth::user();
        $user->update(['password'=>bcrypt($request['password'])]);
        $request->session()->flash('msg-success','Your password updated');
        return redirect()->back();
    }

    public function admins(){
        $admins = User::all();
        return view('admin.admins',compact('admins'));
    }
    public function createAdmin(){
        return view('admin.createNewAdmin');
    }
    public function createAdminPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'email | required | unique:users',
            'password' => 'required | min:6 | max:10'
        ]);
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());
        $request->session()->flash('msg-success','Admin created');
        return redirect()->route('admin.admins');

    }

    public function deleteAdmin($userId){
        $user = User::findOrFail($userId);
        $user->delete();
        Session::flash('msg-danger','Admin deleted');
        return redirect()->back();
    }
}
