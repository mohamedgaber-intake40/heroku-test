<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test',function(){
    return User::all();
});

Route::get('/file',function(){
   $path =Storage::disk('local')->put('file.txt','blablablabla');
   $file = Storage::disk('local')->get($path);
   $mime = Storage::mimeType($path);
    return response($file)->header('Content-Type', $mime);
});
