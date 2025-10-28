<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Invite;
use Illuminate\Support\Str;

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
    /**
     * Gera um token de convite para o condomínio do usuário autenticado.
     */
    public function generateInviteToken(): RedirectResponse
    {
        $user = Auth::user();
        
        // 1. Verifica se o usuário tem um condomínio associado
        if (!$user->condominio_id) {
            return back()->withErrors(['error' => 'Você precisa cadastrar ou se associar a um condomínio antes de gerar convites.']);
        }

        $condominioId = $user->condominio_id;

        // 2. Remove convites não usados e expirados
        Invite::where('condominio_id', $condominioId)
            ->where('used', false)
            ->where('expires_at', '<', now())
            ->delete();

        // 3. Verifica se já existe um token ativo para este condomínio (opcional: limitar a 1 por vez)
        $activeInvite = Invite::where('condominio_id', $condominioId)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if ($activeInvite) {
            // Se já existe, apenas avisa
            return back()->with('status', 'Um link de convite ativo já existe.')->with('invite_token', $activeInvite->token);
        }

        // 4. Cria o novo token
        $token = Str::random(32);
        $expiresAt = now()->addDays(7); // Expira em 7 dias

        Invite::create([
            'condominio_id' => $condominioId,
            'token' => $token,
            'expires_at' => $expiresAt,
        ]);

        return back()->with('status', 'Novo link de convite gerado com sucesso!')->with('invite_token', $token);
    }
}