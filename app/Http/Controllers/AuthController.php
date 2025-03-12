<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Connexion avec IEN et mot de passe
    public function login(Request $request)
    {
        $request->validate([
            'ien' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('ien', $request->ien)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'ien' => ['Identifiants incorrects.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Déconnexion réussie']);
    }


    public function changerMotDePasse(Request $request)
    {
        // Validation des champs
        $request->validate([
            'ancien_mdp' => 'required',
            'nouveau_mdp' => 'required|min:6',
        ]);

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Vérifier si l'ancien mot de passe est correct
        if (!Hash::check($request->ancien_mdp, $user->password)) {
            return response()->json([
                'code' => 401,
                'message' => 'Ancien mot de passe incorrect.'
            ], 401);
        }

        // Mettre à jour le mot de passe
        $user->password = Hash::make($request->nouveau_mdp);
        $user->save();

        return response()->json([
            'code' => 200,
            'message' => 'Mot de passe mis à jour avec succès'
        ], 200);
    }
}
