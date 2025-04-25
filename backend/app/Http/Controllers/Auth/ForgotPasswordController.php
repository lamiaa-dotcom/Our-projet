<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('auth.forget-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
    
        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    
        DB::table('password_resets')->where('email', $request->email)->delete();
    
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $code,
            'created_at' => now(),
        ]);
    
        try {
            Mail::send('emails.forget-password', ['code' => $code], function ($message) use ($request) {
                $message->to($request->email)
                        ->from('imannamihi1@gmail.com', 'Votre Application') // Ajouter l'en-tête "From"
                        ->subject('Code de réinitialisation de mot de passe');
            });
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Erreur lors de l\'envoi de l\'e-mail : ' . $e->getMessage()]);
        }
    
        return redirect()->route('password.verify-code', ['email' => $request->email]);
    }

    public function showVerifyCodeForm(Request $request)
    {
        $email = $request->query('email');

        if (!$email) {
            return redirect()->route('password.request')->withErrors(['email' => 'Adresse e-mail manquante.']);
        }

        return view('auth.verify-code', ['email' => $email]);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'code' => 'required|string|size:6',
        ]);

        $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->code)
            ->first();

        if (!$record) {
            return back()->withErrors(['code' => 'Code invalide ou expiré.']);
        }

        if (now()->diffInMinutes($record->created_at) > 10) {
            DB::table('password_resets')->where('email', $request->email)->delete();
            return back()->withErrors(['code' => 'Le code a expiré. Veuillez recommencer.']);
        }

        // Générer un token pour la réinitialisation
        $token = Str::random(64);
        DB::table('password_resets')->where('email', $request->email)->update([
            'token' => $token,
        ]);

        return redirect()->route('password.reset', ['token' => $token]);
    }
}