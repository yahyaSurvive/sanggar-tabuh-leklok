<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::orderBy('id_achievement', 'ASC')->get();
        return view('admin.pages.achievement', compact('achievements'));
    }

    // public function store(Request $request)
    // {

    //     Gallery::truncate();

    //     $galleryPath = public_path('gallery');
    //     if (File::exists($galleryPath)) {
    //         File::deleteDirectory($galleryPath);
    //     }

    //     File::makeDirectory($galleryPath, 0755, true);

    //     $uploadedFiles = $request->file('files');

    //     if ($uploadedFiles) {
    //         foreach ($uploadedFiles as $index => $file) {
    //             // Simpan file ke folder public/gallery/
    //             // $filename = time() . "_{$index}_" . $file->getClientOriginalName();
    //             // $file->move(public_path('gallery'), $filename);

    //             // Hapus spasi dari nama file
    //             $originalName = $file->getClientOriginalName();
    //             $sanitizedFilename = preg_replace('/\s+/', '_', $originalName);
    //             $uniqueFilename = time() . '_' . $sanitizedFilename;

    //             // Pindahkan file ke folder 'gallery'
    //             $file->move(public_path('gallery'), $uniqueFilename);

    //             Gallery::create([
    //                 'link' => $uniqueFilename,
    //                 'created_at' => now(),
    //                 'updated_at' => now()
    //             ]);

    //         }
    //     }

    //     return response()->json(['message' => 'Gallery saved successfully']);
    // }

    public function store(Request $request)
    {
        $existingFiles = $request->input('existingFiles', []); // ID file lama
        $keptFiles = [];

        // Tangani file lama
        if (!empty($existingFiles)) {
            $keptFiles = Achievement::whereIn('id_achievement', $existingFiles)->get();
        }

        // dd($keptFiles);

        // Hapus file yang tidak ada di daftar
        Achievement::whereNotIn('id_achievement', $existingFiles)->get()->each(function ($photo) {
            $filePath = public_path('achievement/' . $photo->link);
            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file fisik
            }
            $photo->delete(); // Hapus record dari database
        });

        // Tangani file baru
        $uploadedFiles = $request->file('files');
        if ($uploadedFiles) {
            foreach ($uploadedFiles as $file) {
                $originalName = $file->getClientOriginalName();
                $sanitizedFilename = preg_replace('/\s+/', '_', $originalName);
                $uniqueFilename = time() . '_' . $sanitizedFilename;

                $file->move(public_path('achievement'), $uniqueFilename);

                $keptFiles[] = Achievement::create([
                    'link' => $uniqueFilename,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return response()->json(['message' => 'Gallery updated successfully', 'data' => $keptFiles]);
    }



    public function getAchievement()
    {
        $photos = Achievement::all()->map(function ($photo) {
            return [
                'source' => asset('achievement/' . $photo->link),
                'options' => [
                    'type' => 'local', // Menandakan bahwa file sudah ada di server
                    'metadata' => [
                        'id' => $photo->id_achievement,
                    ],
                ],
            ];
        });

        return response()->json($photos);
    }
}
