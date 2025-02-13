<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipientController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/epostcard', [RecipientController::class, 'create']);
Route::post('/epostcard', [RecipientController::class, 'store']);
