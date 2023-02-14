<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'name'=>'required|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|confirmed',
            'age'=>'required',
            'gender'=>'required',
            'image'=>'required|image'
        ]);
        if ($valid->fails()) return back()->with('errors',$valid->errors());

        $inputs = $request->all();
        $inputs['password'] = bcrypt($request->password);
        $inputs['image'] = \Storage::putFile('public/profiles',$request->image);
        $inputs['image'] = str_replace('public/','',$inputs['image']);
        $user = User::create($inputs);
        auth()->loginUsingId($user->id);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $valid = Validator::make($request->all(),[
            'email'=>'required|exists:users,email',
            'password'=>'required',
        ]);
        if ($valid->fails()) return back()->with('errors',$valid->errors());

        $cred = $request->only(['email','password']);
        if (auth()->attempt($cred)){
            return redirect('/');
        }
        return back()->with('error','Invalid Email Or Password');
    }

    public function logout()
    {
        auth()->logout();
        return back();
    }
}
