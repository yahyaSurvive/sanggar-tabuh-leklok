<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        return view('admin.pages.quiz');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'question' => 'required|string',
            'options' => 'required|array|min:4',
            'correct_answer' => 'required|string',
        ]);

        // dd(json_encode($request->options));

        $quiz = \App\Models\Quiz::create([
            'question' => $request->question,
            'options' => json_encode($request->options), // Simpan opsi sebagai JSON
            'answer' => $request->correct_answer,
            'created_at' => now(),
            'created_by' => 'admin',
            'updated_at' => now(),
            'updated_by' => 'admin',
        ]);

        return response()->json([
            'message' => 'Quiz saved successfully!',
            'quiz' => $quiz
        ]);
    }
}
