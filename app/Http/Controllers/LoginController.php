<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {

        $data = User::where('username', $request->username)->get()->first();
        if (Hash::check($request->password, $data->password)) {
            session(['id' => $data->id]);
            session(['username' => $data->username]);
            session(['level' => $data->level]);
            session(['jabatan' => $data->jabatan]);
            if (session('level') == "admin") {
                return redirect('admin');
            } else if (session('level') == "user") {
                return redirect('user');
            } else {
                return redirect('/');
            }

        } else {
            return redirect('/');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect('/');

    }
}
