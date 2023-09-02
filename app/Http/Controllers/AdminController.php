<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'login success');

        } else {
            return back()->with('error', 'invalid error or password');
        }
    }
    public function index()
    {
        return view('auth.admin.login');
    }
    public function dashboard()
    {
        return view('admin-dashboard');

    }
}