<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function gallery()
    {
        $data = DB::table('gallery')
            ->simplePaginate(20);

        return view(
            'user.pages.activity-gallery',
            [
                'data' => $data
            ]
        );
    }
    public function course()
    {
        $data = DB::table('course')
            ->get();
        return view(
            'user.pages.activity-course',
            ['data' => $data]
        );

    }
}
