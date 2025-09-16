<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CondominioController extends Controller
{
    /**
     * Exibe o formulário de cadastro de condomínio.
     */
    public function create(): View
    {
        return view('condominio.create');
    }

    /**
     * Salva um novo condomínio no banco de dados.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'endereco' => ['required', 'string', 'max:255'],
        ]);

        Condominio::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
        ]);

        return redirect()->route('dashboard')->with('status', 'Condomínio cadastrado com sucesso!');
    }
}