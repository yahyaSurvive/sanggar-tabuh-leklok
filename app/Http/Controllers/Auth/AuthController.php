<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return Auth::user()->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect('/'); // Rute untuk user biasa
        }

        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'password' => 'required',
        ]);

        $identifier = $request->input('identifier');
        $password = $request->input('password');

        // Cek apakah pengguna login dengan email atau username
        $loginType = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$loginType => $identifier, 'password' => $password])) {
            return Auth::user()->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect('/');
        }

        return back()->withErrors(['identifier' => 'Invalid credentials']);
    }

    public function showRegisterForm()
    {
        return view('admin.pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        // dd($request->username);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // Default role
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPassword(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email|exists:users,email']);

            $user = User::where('email', $request->email)->first();

            if (!$user) {

                return back()->with("warning", "Email not found.");
            }

            // Generate reset token
            $token = Str::random(60);

            // Simpan token ke database (buat tabel reset password jika belum ada)
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                [
                    'token' => $token,
                    'created_at' => now(),
                ]
            );

            // Buat link reset password
            $resetLink = url('/reset-password?token=' . $token);

            // Kirim email
            Mail::to($user->email)->send(new ForgotPasswordMail($user, $resetLink));

            return back()->with("message", "We have emailed Your password rest link.");
        }
        catch(ValidationException $e){
            return back()->with("not_found", "Email not found.");
        }
        catch (\Throwable $th) {
            return back()->withErrors(["error" => "Failed to send email", "message" => $th]);
        }
        // return response()->json(['message' => 'Password reset email sent.']);
    }

    public function showFormResetPassword(Request $request){
        $token = $request->query('token');

        $checkToken = DB::table("password_reset_tokens")->where("token", $token)->first();

        if($checkToken != NULL){
            return view('admin.pages.reset_password', ['token' => $token]);
        }
        else{
            return redirect(route('forgot_password'));
        }
    }

    public function submitResetPassword(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'new_password' => 'required|string|min:6',
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Invalid email format.',
                'email.exists' => 'This email does not exist in our records.',
                'new_password.required' => 'Password is required.',
                'new_password.min' => 'Password must be at least 6 characters.',
            ]);


            $updatePassword = DB::table('password_reset_tokens')
                ->where([
                    'email' => $request->email,
                    'token' => $request->token
                ])
                ->first();

            if (!$updatePassword) {
                return back()->withInput()->with('error', 'Invalid token!');
            }

            $user = User::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

            DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

            return redirect(route('login'))->with('message_reset', 'Your password has been changed!');
        } catch (ValidationException $e) {
            dd($e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to reset password.', 'message' => $e->getMessage()])->withInput();
        }
    }

}
