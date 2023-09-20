<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\MultimediaFile;
use Illuminate\Http\Request;

class MultimediaFileController extends Controller {
    public function index(Artist $artist) {
        $multimediaFiles = $artist->multimediaFiles;
        return response()->json($multimediaFiles);
    }

    public function store(Artist $artist, Request $request) {
        $data = $request->validate([
            'file_name' => 'required|string|max:255',
            'file_type' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $file = new MultimediaFile([
            'file_name' => $data['file_name'],
            'file_type' => $data['file_type'],
            // Assign other data as needed
        ]);

        $artist->multimediaFiles()->save($file);

        return response()->json($file, 201);
    }

    public function show(Artist $artist, MultimediaFile $multimediaFile) {
        // Ensure the multimedia file belongs to the artist
        if ($multimediaFile->artist_id != $artist->id) {
            return response()->json(['error' => 'Multimedia file not found for this artist.'], 404);
        }

        return response()->json($multimediaFile);
    }

    public function update(Artist $artist, MultimediaFile $multimediaFile, Request $request) {
        // Ensure the multimedia file belongs to the artist
        if ($multimediaFile->artist_id != $artist->id) {
            return response()->json(['error' => 'Multimedia file not found for this artist.'], 404);
        }

        $data = $request->validate([
            'file_name' => 'required|string|max:255',
            'file_type' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $multimediaFile->update($data);

        return response()->json($multimediaFile);
    }

    public function destroy(Artist $artist, MultimediaFile $multimediaFile) {
        // Ensure the multimedia file belongs to the artist
        if ($multimediaFile->artist_id != $artist->id) {
            return response()->json(['error' => 'Multimedia file not found for this artist.'], 404);
        }

        $multimediaFile->delete();

        return response()->json(null, 204);
    }
}
