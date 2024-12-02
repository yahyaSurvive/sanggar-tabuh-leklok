<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class QuisController extends Controller
{
    public function index()
    {
        return view('user.pages.quis');
    }

    public function quis_start()
    {
        return view('user.pages.quis-start');
    }
    public function quis_submit(Request $request)
    {
        try {
            return $request->all();
        } catch (\Throwable $th) {
            Log::error('error' . $th->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error : ' . $th->getMessage()
            ], 500);
        }
    }
}
