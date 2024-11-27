<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $account = Account::where('email', $request->email)->first();

        if ($account && Hash::check($request->password, $account->password)) {
            Auth::login($account);
    
            // Redirect berdasarkan role
            if ($account->mahasiswa) {
                return redirect()->route('dashboard-mhs');
            } elseif ($account->pembimbing_akademik) {
                return redirect()->route('dashboard-doswal');
            }
        } else {
            // Mengirimkan pesan error ke session jika login gagal
            return back()->withErrors(['login_error' => 'Email atau password salah.']);
        }
    }


}

