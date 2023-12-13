<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasukController extends Controller
{
    public function index()
    {
        return view('masuk');
    }

    public function rules(): array
    {
        return [
            'role' => 'required',
            'nim' => 'required|min:9',
            'password' => 'required|min:8',
        ];
    }
    public function messages(): array
    {
        return [
            'role.required' => 'Role Harus Diisi.',
            'nim.required' => 'NIM Harus Diisi',
            'nim.min' => 'NIM Harus :min Karekter',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password Harus :min Karekter',
        ];
    }

    public function store(Request $request)
    {
        $user = $request->validate($this->rules(), $this->messages());

        if ($request->role == 'admin') {
            if (Auth::attempt($user)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }
        if ($request->role == 'mahasiswa') {
            if (Auth::attempt($user)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
        }

        return back()->withInput()->with('gagal', 'Gagal Masuk');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/masuk');
    }
}
