<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Alert;

class UserController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }
    public function viewRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:4', 'max:200'],
        ]);
        $userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);
        if (!$user) {
            alert()->error('ErrorAlert', 'Lorem ipsum dolor sit amet.');
            return redirect(route('register.view', 'register'))->with('errors', 'Something wrong');
        } else {
            alert()->success('Done', 'Registration successfully. please Login to continue shopping 😘');
            //intended: return back to previous page
            return redirect()->route('home')->with('success', 'Registration successfully. please Login to continue shopping 😘');
        }
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
            toast('Login Successfully', 'success');
            return redirect('/');
        } else {
            toast('Your email or password are not correct', 'error');
            return redirect(route('login.view', 'login'))->with('errors', 'Something wrong');
        }
    }
    public function logout()
    {   session()->flush();
        auth()->logout();
        return redirect('/');
        alert()->success('Logout', 'See you again😍');
    }
}
