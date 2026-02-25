<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BastController;
use App\Models\Bast;

Route::redirect('/', '/admin');

Route::get('/bast/{bast}/print', function (Bast $bast) {
    return view('pdf.bast', compact('bast'));
    })->name('bast.print');

Route::get('/basts/{bast}/pdf', [BastController::class, 'print'])
    ->name('bast.pdf');

Route::get('/basts/{bast}/download', [BastController::class, 'print'])
    ->name('bast.download');

