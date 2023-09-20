<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller {
    function store(Request $request) {
        $request->validate(
            [
            'name'=>'required',
            
            ]
            );
            $Artist = Artist::create([
                             'name'=>$request->name,
               
                
            ]);
            //we then find the Artist$Artist using their id
            $Artist = Artist::find($Artist->id);
            //if the Artist$Artist is present it prints his/her details
            if($Artist){
                return response([
                    'message'=>'success',
                    'response'=>$Artist
                ]);
            };
    }
    // public function store(Request $request) {
    //     \Log::info('Received data:', $request->all());
    //     $data = $request->validate([
    //         'name' => 'required|string|max:255|unique:artists',
    //     ]);

    //     $artist = Artist::create($data);

    //     return response()->json(['message' => 'Artist created successfully', 'artist' => $artist], 201);

    // }

    public function index() {
        $artists = Artist::all();

        return response()->json($artists);
    }

    public function show(Artist $artist) {
        return response()->json($artist);
    }

    public function update(Request $request, Artist $artist) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $artist->update($data);

        return response()->json($artist);
    }

    public function destroy(Artist $artist) {
        $artist->delete();

        return response()->json(null, 204);
    }
}
    try {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:artists',
        ]);
    
        $artist = Artist::create($data);
    
        return response()->json(['message' => 'Artist created successfully', 'artist' => $artist], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Artist creation failed', 'error' => $e->getMessage()], 500);
    }
    





    



