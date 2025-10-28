<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Exibe a lista de usuários filtrada pelo condomínio do administrador.
     */
    public function index(): View
    {
        $user = Auth::user();

        // 1. Verifica se o administrador está associado a um condomínio
        if ($user->condominio_id) {
            // 2. Filtra usuários que possuem o mesmo ID do condomínio
            $users = User::where('condominio_id', $user->condominio_id)->get();
        } else {
            // Se o administrador não tem condomínio, exibe lista vazia
            $users = collect(); 
        }

        return view('usuarios.index', compact('users'));
    }
}