<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Exibe a lista de usuários.
     */
    public function index(): View
    {
        $users = User::all();

        return view('usuarios.index', compact('users'));
    }
}