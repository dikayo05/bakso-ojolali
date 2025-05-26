<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaksoController;
use App\Http\Controllers\PesananController;

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [BaksoController::class, 'index'])->name('admin');
    Route::resource('bakso', BaksoController::class)->except(['index', 'show']);

    Route::get('/user', function () {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Unauthorized');
        }
        $baksos = DB::table('baksos')->get();
        return view('user.index', compact('baksos'));
    });

    Route::get('/bakso/{id}/deskripsi', function ($id) {
        $bakso = DB::table('baksos')->where('id', $id)->first();
        abort_unless($bakso, 404);
        return view('bakso.deskripsi', compact('bakso'));
    })->name('bakso.deskripsi');

    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
    Route::put('/pesanan/{id}/batal', [PesananController::class, 'batal'])->name('pesanan.batal');
});
