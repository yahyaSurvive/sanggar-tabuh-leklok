<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $dataCourse = Course::orderBy('id_course', 'DESC')->get();
        return view('admin.pages.course', compact('dataCourse'));
    }

    public function store(Request $request)
    {
        // dd(intval($request->price_course));
        // Validasi data
        $request->validate([
            'name_course' => 'required|string',
            'price_course' => 'required|integer',
            'day_start' => 'required|string',
            'start_hour' => 'required',
            'end_hour' => 'required',
            'additional' => 'required|string',
            'file' => 'required'
        ]);


        // modif file name
        $originalNameFile = $request->file->getClientOriginalName();
        $sanitizedFilename = preg_replace('/\s+/', '_', $originalNameFile);
        $uniqueFilename = time() . '_' . $sanitizedFilename;

        // move file no folder
        $request->file->move(public_path('course'), $uniqueFilename);

        $course = \App\Models\Course::create([
            'name' => $request->name_course,
            'price' => intval($request->price_course),
            'start_day' => $request->day_start,
            'end_day' => $request->day_end,
            'start_hour' => $request->start_hour,
            'end_hour' => $request->end_hour,
            'additional' => $request->additional,
            'photo' => $uniqueFilename,
            'video_link' => $request->course_video,
            'created_at' => now(),
            'created_by' => 'admin',
            'updated_at' => now(),
            'updated_by' => 'admin',
        ]);

        return response()->json([
            'message' => 'Course saved successfully!',
            'course' => $course
        ]);
    }

    public function detail($id)
    {
        try {
            $detail = Course::findOrFail($id);

            // Tambahkan URL lengkap untuk kolom photo
            $detail->photo = $detail->photo ? asset('course/' . $detail->photo) : null;

            return response()->json([
                'success' => true,
                'data' => $detail
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404); // Gunakan status code 404 untuk data yang tidak ditemukan
        }
    }


    // public function detail($id){

    //     try {
    //         $detail = Course::findOrFail($id);

    //         return response()->json([
    //             'success' => true,
    //             'data' => $detail
    //         ], 200);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data not found'
    //         ], 200);
    //     }
    // }

    public function update(Request $request, $id)
    {
        try {

            $uniqueFilename = "";
            $course = Course::findOrFail($id);

            if ($request->file != "old") {
                // delete photo from folder
                $filePath = public_path('course/' . $course->photo);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }

                // make unique file
                $originalNameFile = $request->file->getClientOriginalName();
                $sanitizedFilename = preg_replace('/\s+/', '_', $originalNameFile);
                $uniqueFilename = time() . '_' . $sanitizedFilename;

                // move to folder
                $request->file->move(public_path('course'), $uniqueFilename);
            } else {
                $uniqueFilename = $course->photo;
            }


            $course->name = $request->name_course;
            $course->price = $request->price_course;
            $course->start_day = $request->day_start;
            $course->end_day = $request->day_end;
            $course->start_hour = $request->start_hour;
            $course->end_hour = $request->end_hour;
            $course->additional = $request->additional;
            $course->photo = $uniqueFilename;
            $course->video_link = $request->course_video;
            $course->created_at = now();
            $course->created_by = 'admin';
            $course->updated_at = now();
            $course->updated_by = 'admin';
            $course->save();

            return response()->json([
                'success' => true,
                'message' => 'Course updated successfully!',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Problem',
                'error' => $th
            ], 200);
        }
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        $filePath = public_path('course/' . $course->photo);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $course->delete();

        return response()->json(['message' => 'Course deleted successfully'], 200);
    }
}
