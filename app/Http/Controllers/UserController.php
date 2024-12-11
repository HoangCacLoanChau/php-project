<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $userData = $request-> validate([
            'name'=> ['required', Rule::unique('users', 'name')],
            'email'=> ['required', 'email'],
            'password'=> ['required', 'min:8', 'max:200'],
        ]);
        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        auth()->login($user);
        return redirect('/');

    }
    public function login(Request $request){
        $loginData = $request-> validate([
            'loginname'=> ['required'],
            'loginpassword'=> 'required',
        ]);
       if(auth()->attempt(['name'=> $loginData['loginname'], 'password'=> $loginData['loginpassword']])) {
        $request->session()->regenerate();
       }
        return redirect('/');

    }
    public function logout(){
        auth()->logout();
        return redirect('/');

    }
}
