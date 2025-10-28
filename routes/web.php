<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CondominioController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas para Condomínios
    Route::get('/condominios', [CondominioController::class, 'index'])->name('condominio.index');
    Route::get('/condominio/create', [CondominioController::class, 'create'])->name('condominio.create');
    Route::post('/condominio', [CondominioController::class, 'store'])->name('condominio.store');
    
    // Rotas para Usuários
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');

    // Rota para gerar o token de convite
    Route::post('/condominio/invite/generate', [CondominioController::class, 'generateInviteToken'])
        ->name('condominio.invite.generate');
});

require __DIR__.'/auth.php';