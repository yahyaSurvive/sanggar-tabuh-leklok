<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.pages.profile');
    }

    public function update(Request $request){
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        // dd($request->username);

        $user = Auth::user();

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Password successfully updated.');

        return redirect()->route('admin.profile');
    }
}
