<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        $dataQuiz = Quiz::orderBy('id_quiz', 'ASC')->get();
        return view('admin.pages.quiz', compact('dataQuiz'));
    }

    public function store(Request $request)
    {
        // dd("store");
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

    public function detail($id){

        try {
            $detail = Quiz::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $detail
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 200);
        }
    }

    public function update(Request $request, $id) {
        try {

            $quiz = Quiz::findOrFail($id);
            $quiz->question = $request->question;
            $quiz->options = json_encode($request->options); // Assume options is an array or JSON
            $quiz->answer = $request->correct_answer;
            $quiz->save();

            return response()->json([
                'success' => true,
                'message' => 'Quiz updated successfully!',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Problem',
            ], 200);
        }
    }

    public function destroy($id){
        $quiz = Quiz::find($id);

        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        $quiz->delete();

        return response()->json(['message' => 'Quiz deleted successfully'], 200);
    }


    // public function edit($id) {
    //     $quiz = Quiz::findOrFail($id);
    //     return response()->json([
    //         'success' => true,
    //         'data' => $quiz,
    //     ]);
    // }

}
