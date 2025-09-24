<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CondominioController extends Controller
{
    /**
     * Exibe a lista de condomínios.
     */
    public function index(): View
    {
        $condominios = Condominio::all();

        return view('condominio.index', compact('condominios'));
    }

    /**
     * Exibe o formulário de cadastro de condomínio.
     */
    public function create(): View
    {
        return view('condominio.create');
    }

    /**
     * Salva um novo condomínio no banco de dados e associa ao usuário.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:9'],
            'endereco' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
        ]);

        $condominio = Condominio::create([
            'nome' => $request->nome,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
        ]);
        
        // Associa o condomínio criado ao usuário logado
        $user = Auth::user();
        $user->condominio_id = $condominio->id;
        $user->save();

        return redirect()->route('dashboard')->with('status', 'Condomínio cadastrado com sucesso!');
    }
}