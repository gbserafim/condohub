<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Invite;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'bloco' => ['required', 'string', 'max:50'],
            'unidade' => ['required', 'string', 'max:50'],
        ]);

        $condominioId = null;
        $isAdmin = User::count() === 0;
        $invite = null;

        // Lógica para convite (apenas se houver um token)
        if ($request->filled('invite_token')) {
            $invite = Invite::where('token', $request->invite_token)
                ->where('used', false)
                ->where('expires_at', '>', now())
                ->first();

            if (!$invite) {
                // Lança exceção se o token for inválido/expirado
                throw ValidationException::withMessages([
                    'invite_token' => 'O link de convite é inválido ou expirou.',
                ]);
            }
            
            $condominioId = $invite->condominio_id;
        } 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin,
            'condominio_id' => $condominioId,
            'bloco' => $request->bloco,
            'unidade' => $request->unidade,
        ]);

        // Se um convite foi usado com sucesso, marque-o como usado.
        if (isset($invite)) {
            $invite->used = true;
            $invite->save();
        }

        event(new Registered($user));

        // ESTE É O BLOCO DE REDIRECIONAMENTO CORRETO:
        session()->flash('success', 'Sua conta foi criada com sucesso! Por favor, faça login.');

        // Redireciona para a tela de login.
        return redirect(route('login'));
    }
}