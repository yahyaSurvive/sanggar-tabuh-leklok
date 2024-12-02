<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile()
    {
        try {
            return view(
                'user.pages.user-profile'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }

    public function update_profile(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'no_hp' => 'required'
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.required' => 'Nomor HP harus diisi.',
        ]);

        return back()->with(["message" => "Berhasil update profil"]);
    }

    public function change_password()
    {
        try {
            return view(
                'user.pages.user-change-password'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'new-password' => 'required|string|min:8', // password baru harus diisi dan minimal 8 karakter
            'password-confirmation' => 'required|string|same:new-password', // pastikan password konfirmasi sama dengan password baru
        ], [
            'new-password.required' => 'Password baru harus diisi.',
            'new-password.min' => 'Password baru harus minimal 8 karakter.',
            'password-confirmation.required' => 'Konfirmasi password harus diisi.',
            'password-confirmation.same' => 'Konfirmasi password tidak cocok dengan password baru.',
        ]);

        return back()->with(["message" => "Password berhasil diupdate"]);
    }
}
