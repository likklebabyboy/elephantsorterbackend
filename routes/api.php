<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// routes/api.php
Route::get('artists/{artist}', 'ArtistController@show');
Route::post('/store',[ArtistController::class,'store']);
// Route::post('artists/{artist}', 'ArtistController@store');
Route::delete('artists/{artist}', 'ArtistController@destroy');
Route::apiResource('artists', ArtistController::class);
Route::apiResource('artists.multimedia', MultimediaFileController::class)->shallow();
// Route::post('/artists', 'ArtistController@store');
// Route::delete('/DeleteArtist',[ArtistController::class,'Delete']);
// Route::get('/artists', 'ArtistController@index'); // Adjust the controller and method accordingly
// Route::resource('artists', 'ArtistController');
// Route::resource('artists.multimedia', 'MultimediaFileController'); // Nested route
// Route::post('/artists/{id} ', [ArtistController::class, 'store']);

// Route::get('/readartists', [ArtistController::class, 'readartists']);
// Route::update('/UpdateArtist',[ArtistController::class,'UpdateArtists']);

