<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class QuisController extends Controller
{
    public function index()
    {
        $lastQuiz = Cache::get('quiz');

        return view(
            'user.pages.quis',
            [
                'last_quiz' => $lastQuiz
            ]
        );
    }

    public function quis_start()
    {
        $data = DB::table('quiz')
            ->select('id_quiz as id', 'question', 'options')
            ->take(10)
            ->get();
        return view(
            'user.pages.quis-start',
            ["data" => $data]
        );
    }
    public function quis_submit(Request $request)
    {
        try {
            $answers = $request->input('answers', []);

            $correct = [];
            $data = [];
            foreach ($answers as $key => $answer) {
                $quiz = DB::table('quiz')
                    ->select('id_quiz', 'answer', 'options', 'question')
                    ->where('id_quiz', $key)
                    ->first();

                $correct[] = $answer == $quiz->answer ? true : false;

                $data[] = [
                    'id_quiz' => $quiz->id_quiz,
                    'question' => $quiz->question,
                    'options' => $quiz->options,
                    'correct_answer' => $quiz->answer,
                    'answer_user' => $answer
                ];

            }

            $totalCorrect = count(array_filter($correct));

            // Hitung total pertanyaan
            $totalQuestions = count($answers);

            // Cegah pembagian dengan nol jika tidak ada pertanyaan
            if ($totalQuestions > 0) {
                $score = ($totalCorrect / $totalQuestions) * 100;
            } else {
                $score = 0;
            }

            $tryout = [
                'id_user' => 1,
                'quiz' => json_encode($data),
                'total_correct' => $totalCorrect,
                'total_questions' => $totalQuestions,
                'score' => (int) $score
            ];

            Cache::forever('quiz', $tryout);

            // dd($tryout);
            // DB::table('tryout')
            //     ->insert([
            //         'id_user' => 1,
            //         'quiz' => json_encode($data),
            //         'total_correct' => $totalCorrect,
            //         'total_questions' => $totalQuestions,
            //         'score' => (int) $score,
            //         'created_at' => Carbon::now(),
            //         'created_by' => 'user',
            //         'updated_at' => Carbon::now(),
            //         'updated_by' => 'user'
            //     ]);

            return response()->json([
                'success' => true,
                'message' => 'Quis berhasil diselesaikan.'
            ]);

        } catch (\Throwable $th) {
            Log::error('error' . $th->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error : ' . $th->getMessage()
            ], 500);
        }
    }

    public function review_answers()
    {
        $data = Cache::get('quiz');
        // Cache::forget('quiz');
        return view(
            'user.pages.quis-review-answers',
            ["data" => $data]
        );
    }
}
