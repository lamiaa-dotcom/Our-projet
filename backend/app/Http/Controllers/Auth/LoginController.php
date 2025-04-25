<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Ajoute ceci pour utiliser la classe Request

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirection après connexion
    protected $redirectTo = '/home'; 

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Définir la redirection après la connexion
    protected function redirectTo()
    {
        // Vérifie le rôle de l'utilisateur (admin ou utilisateur standard)
        if (auth()->user()->is_admin) {
            // Si l'utilisateur est un admin, redirige vers le tableau de bord admin
            return route('admin.dashboard');
        }

        // Sinon, redirige vers la page d'accueil ou autre destination
        return route('home');
    }

    // Méthode de déconnexion
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige vers la page de login après la déconnexion
        return redirect('/login');
    }
}
