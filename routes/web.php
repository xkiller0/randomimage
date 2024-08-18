<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/api/{randomCharacters}', [ImageController::class, 'showImage']);
Route::get('/api/{randomCharacters}', [ImageController::class, 'showImage_nometadata']);
Route::get('/apiv2/{randomCharacters}', [RedirectController::class, 'redirectUrl']);
