<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        try {
            $user = Auth::user();
            return view(
                'user.pages.user-profile',
                [
                    'user' => $user
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }

    public function update_profile(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'username' => [
                'required',
                'string',
                Rule::unique('users', 'username')->ignore(Auth::user()->id) // Abaikan username milik ID user saat ini
            ],
            'email' => 'required|email',
        ], [
            'name.required' => 'Nama harus diisi.',
            'username.required' => 'Username harus diisi.',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->save();

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
            'new-password' => 'required|string|min:6', // password baru harus diisi dan minimal 8 karakter
            'password-confirmation' => 'required|string|same:new-password', // pastikan password konfirmasi sama dengan password baru
        ], [
            'new-password.required' => 'Password baru harus diisi.',
            'new-password.min' => 'Password baru harus minimal 6 karakter.',
            'password-confirmation.required' => 'Konfirmasi password harus diisi.',
            'password-confirmation.same' => 'Konfirmasi password tidak cocok dengan password baru.',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->input('password-confirmation'));
        $user->save();

        return back()->with(["message" => "Password berhasil diupdate"]);
    }
}
