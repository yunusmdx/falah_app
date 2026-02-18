<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BastController;

Route::redirect('/', '/admin');

Route::get('/basts/{bast}/pdf', [BastController::class, 'print'])
    ->name('bast.pdf');

Route::get('/basts/{bast}/download', [BastController::class, 'print'])
    ->name('bast.download');

