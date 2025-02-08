<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function history()
    {
        try {
            return view(
                'user.pages.about-us-history'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
    public function meaning()
    {
        try {
            return view(
                'user.pages.about-us-meaning'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
    public function trainerProfile()
    {
        try {
            return view(
                'user.pages.about-us-trainer-profile'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
    public function achievement()
    {
        $data = DB::table('achievement')
            ->simplePaginate(20);

        return view(
            'user.pages.about-us-achievement',
            [
                'data' => $data
            ]
        );
    }
}
