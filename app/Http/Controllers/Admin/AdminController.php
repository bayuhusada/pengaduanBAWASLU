<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function FormLogin()
    {
        return view('Admin.login');

    }

    public function login(Request $request)
    {
        $username = Petugas::where('username', $request->username)->first();

        if (!$username){
            return redirect()->back()->with(['pesan' => 'Username Tidak Tersedia/terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password){
            return redirect()->back()->with(['pesan' => 'Password Salah']);
        }

        $auth = Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request ->password]);

        if ($auth) {
            return redirect()->route('dashboard.index');
        } else{
            return redirect()->back()->with(['pesan' => 'Akun Tidak Ada']);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->route('admin.formLogin');
    }
}
