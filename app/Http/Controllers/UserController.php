<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Alert;

class UserController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }
    public function viewRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 0, // Ensure the user is not an admin
        ]);

        // Log the user in
        Auth::login($user);
        if (!$user) {
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

        // Check for other users with valid credentials
        if (auth()->attempt(['email' => $loginData['email'], 'password' => $loginData['loginpassword']])) {
            // Get the authenticated user
            $user = auth()->user();

            // Check if the user is an admin
            if ($user->is_admin == 1) {
                return redirect(route('handle.car'));
            }

            // Redirect to regular user home page if not an admin
            $request->session()->regenerate();
            toast('Login Successfully', 'success');
            return redirect(route('home')); 
        }
         else {
            toast('Your email or password is incorrect', 'error');
            return redirect(route('login.view', 'login'))->withErrors('Invalid credentials');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
        alert()->success('Logout', 'See you again😍');
    }
    public function viewAdmin()
    {
        return view('admin.dashboard');
    }
}
