<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inicio', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/fecha', function () {
    $fecha = [
        'dia' => date('d'),
        'mes' => date('m'),
        'ano' => date('Y')
    ];

    return view('fecha', compact('fecha'));
})->middleware(['auth', 'verified'])->name('fecha');

Route::get('/fecha2', function () {
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');

    return view('fecha2', compact('dia', 'mes', 'ano'));
})->middleware(['auth', 'verified'])->name('fecha2');

Route::get('/fecha3', function () {
    $dia = date('d');
    $mes = date('m');
    $ano = date('Y');

    return view('fecha3')->with('dia', $dia)->with('mes', $mes)->with('ano', $ano);
})->middleware(['auth', 'verified'])->name('fecha3');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
