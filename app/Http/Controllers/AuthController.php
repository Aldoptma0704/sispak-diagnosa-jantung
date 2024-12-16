<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $user = Session::get('user');

        if ($user) {
            if($user['role'] === 'admin'){
                return redirect('admin/dashboard');
            }else{
                return redirect('user/dashboard');
            }
        }

        return view('auth.login');
    }

    public function showRegisterForm()
    {
        $user = Session::get('user');

        if($user){
            if($user['role'] === 'admin'){
                return redirect('admin/dashboard');
            }else{
                return redirect('user/dashboard');
            }
        }

        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && password_verify($request->password, $user->password)) {
    
            Session::put('user', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ]);

           
            if ($user->role === 'admin') {
                return redirect('admin/dashboard');
            } else {
                return redirect('user/dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT), // Hash password menggunakan bcrypt
            'role' => 'user', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('login')->with('success', 'Registration successful, please login');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/');
    }
}
