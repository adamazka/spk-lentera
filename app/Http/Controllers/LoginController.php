<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Halaman Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        try {
            $crds = $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            try {
                $user = User::where('username', "=", $request->username)->get();   
                if (!empty($user->first()->username)) {
                    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                        $request->session()->regenerate();
                        return redirect()->route('guru.index');
                    } else {
                        return back()->withErrors(['loginError' => "Maaf! Password anda salah mohon coba lagi."])->withInput();
                    }
                } else {
                    return back()->withErrors(['loginError' => "Maaf! Username yang anda masukkan tidak terdaftar."])->withInput();
                }
            } catch (\Exception $a) {
                return back()->withErrors(['sistemLoginError' => $a->getMessage()])->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors(['loginError' => 'Maaf! Email atau Password masih kosong.'])->withInput();
        }
    }

    public function username()
    {
        $login = request()->input('username');
        $field = filter_var($login);
        request()->merge([$field => $login]);
        return $field;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}