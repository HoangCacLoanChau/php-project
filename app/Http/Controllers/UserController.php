<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
Use Alert;

class UserController extends Controller
{
    public function viewPage($view)
    {
        return view($view);
    }
    public function register(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:1', 'max:200'],
        ]);
        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        //intended: return back to previous page
        if(!$user){
            alert()->error('Something went wrong',"Register fail");
            return redirect(route('register.view','register'))->with('errors',"Register fail");
        }
        alert()->success('Done',"Registration successfully. please Login to continue shopping 😘");
        return redirect()->intended(route('home'))->with('success',"Registration successfully. please Login to continue shopping 😘");
    }
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => ['required'],
            'loginpassword' => 'required',
        ]);
        if (auth()->attempt(['email' => $loginData['email'], 'password' => $loginData['loginpassword']])) {
            $request->session()->regenerate();
            //intended: return back to previous page
            toast('Login Successfully','success');
            return redirect()->intended(route('home'));
        } else {
            toast('Your Login detail are not correct','error');
            return redirect(route('login.view','login'))->with('errors', 'Something wrong');
        }
    }
    public function logout()
    {   
        auth()->logout();
        alert()->success('Logout','See you again😍');
        return redirect('/');
    }
}
