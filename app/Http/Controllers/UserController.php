<?php

namespace App\Http\Controllers;

use App\Mail\KirimEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    // Register
    public function register()
    {
        return view('user.register');
    }

    public function register_store(Request $request)
    {
        // return $request;
        $request->validate([
            'fullname' => 'required|min:2|max:100',
            'email' => 'required|unique:users',
            'password' => 'required|alpha_num|min:7|max:16',
            'retype_password' => 'required|same:password|min:8|max:16',
            'birthday' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'gender' => 'required'
        ],
        [
            'fullname.required' => 'Name Wajib di isi',
            'fullname.min' => 'Nama minimal 2 karakter',
            'fullname.max' => 'Nama maksimal 100 karakter',
            'email.required' => 'Email sudah digunakan',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Minimal angka dan huruf',
            'password.alpha_num' => 'Minimal angka dan huruf',
            'password.min' => 'Minimal 8 karakter'
        ]);

        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password) ,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'level' => 'user'
        ]);
        return redirect('/login_user');
    }

    public function login_store(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:8|max:16'
        ],
    [
        'email.required' => 'Email harus di isi',
        'password.required' => 'Minimal angka dan huruf',
        'password.alpha_num' => 'Minimal angka dan huruf',
        'password.min' => 'Minimal 8 karakter'
    ]);
        
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if (Auth::check()){
            $isi =  [
                'barang' => 'bunga',
                'desc' => 'bunga layu'
            ];
            Mail::to('apriando.pratamaa@gmail.com')->send(new KirimEmail($isi));
            return redirect('/home');
        }else{
            return redirect('/login_user');
        }
    }

    public function logout ()
    {
        Auth::logout();
        return redirect('/home');
    }
}
