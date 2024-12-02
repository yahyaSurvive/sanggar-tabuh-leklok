<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index()
    {
        try {
            return view(
                'user.pages.beranda'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
