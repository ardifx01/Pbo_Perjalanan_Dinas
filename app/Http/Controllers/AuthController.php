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


        $_pegawai = pegawai::where('no_induk', $_loginVal['no_induk'])->first();

        if($_pegawai && Hash::check($_loginVal['password'], $_pegawai->password)){
            Auth::guard('pegawai')->login($_pegawai);
            $request->session()->regenerate();

            if($_pegawai->role === 'admin')
            {
                return redirect()->route("admin.dahsboard");
            }
            else
            {
                return redirect()->route("pegawai.dashboard");
            }
        }
        else{
             return back()->withErrors([
            'no_induk' => 'The provided credentials do not match our records.',
            ]);
        }

    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('root');
    }
}
