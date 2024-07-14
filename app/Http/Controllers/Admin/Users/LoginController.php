<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Admin
    public function index()
    {
        return View('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))
        ) {
            return redirect()->route('admin');
        }

        Session()->flash('error', 'Email hoặc Password không chính xác');
        return redirect()->back();
    }

    // Customer
    public function customerLogin()
    {
        return view('customer.login', [
            'title' => 'Đăng nhập'
        ]);
    }

    public function customerRegister()
    {
        return view('customer.register', [
            'title' => 'Đăng ký'
        ]);
    }

    public function storeRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|same:password',
            'terms'=> 'required'
        ]);
        $request['password'] = Hash::make($request['password']);

        try {
            User::create($request->input());
        } catch (\Exception $err) {
            return redirect()->back();
        }
        return redirect('');
    }
}
