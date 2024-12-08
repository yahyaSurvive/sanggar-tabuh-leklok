<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::orderBy('id_gallery', 'ASC')->get();
        return view('admin.pages.gallery', compact('galleries'));
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
            $keptFiles = Gallery::whereIn('id_gallery', $existingFiles)->get();
        }

        // dd($keptFiles);

        // Hapus file yang tidak ada di daftar
        Gallery::whereNotIn('id_gallery', $existingFiles)->get()->each(function ($photo) {
            $filePath = public_path('gallery/' . $photo->link);
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

                $file->move(public_path('gallery'), $uniqueFilename);

                $keptFiles[] = Gallery::create([
                    'link' => $uniqueFilename,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return response()->json(['message' => 'Gallery updated successfully', 'data' => $keptFiles]);
    }



    public function getGallery()
    {
        $photos = Gallery::all()->map(function ($photo) {
            return [
                'source' => asset('gallery/' . $photo->link),
                'options' => [
                    'type' => 'local', // Menandakan bahwa file sudah ada di server
                    'metadata' => [
                        'id' => $photo->id_gallery,
                    ],
                ],
            ];
        });

        return response()->json($photos);
    }

}
