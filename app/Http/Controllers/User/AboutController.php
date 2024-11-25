<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        try {
            return view(
                'user.pages.about-us',
                [
                    'title' => 'Tentang Kami'
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
