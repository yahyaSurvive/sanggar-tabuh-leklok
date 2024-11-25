<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return view(
                'user.pages.home',
                [
                    'title' => 'Home'
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
