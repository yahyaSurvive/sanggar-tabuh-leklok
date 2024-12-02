<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function gallery()
    {
        try {
            return view(
                'user.pages.activity-gallery'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
    public function course()
    {
        try {
            return view(
                'user.pages.activity-course'
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
