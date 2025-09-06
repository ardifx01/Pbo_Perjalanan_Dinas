<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Models\pegawai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowLogin()
    {
        return view("auth.login");
    }

    public function LoginProcess(Request $request)
    {
       $_loginVal = $request->validate([
            'no_induk' => ['required', 'integer'],
            'password' => ['required', 'string']
        ]);

        if (Auth::guard('pegawai')->attempt([
            'no_induk' => $_loginVal['no_induk'],
            'password' => $_loginVal['password'],
        ])) {
            $request->session()->regenerate();

            $user = Auth::guard('pegawai')->user();
            if ($user->role === 'admin') {
                return redirect()->route("admin.dashboard");
            } else {
                return redirect()->route("pegawai.dashboard");
            }
        }

        return back()->withErrors([
            'no_induk' => 'The provided credentials do not match our records.',
        ]);
    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('root');
    }
}
