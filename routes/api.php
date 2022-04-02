<?php

use App\Http\Controllers\SocialMediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    //public area
    Route::get('', function () {
	    return response()->json([
	        'status' => 'API_ONLINE',
        ]);
    });

    Route::prefix('/social-media')->group(function () {
        Route::get('/', [SocialMediaController::class, 'index']);
        Route::post('/save', [SocialMediaController::class, 'save']);
        Route::delete('/delete/{id}', [SocialMediaController::class, 'delete']);
        Route::post('/edit/{id}', [SocialMediaController::class, 'edit']);
    });
});