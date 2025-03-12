<?php

namespace App\Http\Controllers;

use App\Models\BulletinSemestriel;
use Illuminate\Http\Request;
use App\Models\User;

class BulletinSemestrielController extends Controller
{
    public function getBulletins(Request $request, $ien, $semestre, $annee)
    {
        // Vérifier si l'élève existe avec cet IEN
        $user = User::where('ien', $ien)->first();
        
        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'Élève introuvable.'
            ], 404);
        }

        // Récupérer les bulletins associés à cet élève pour le semestre et l'année donnés
        $bulletins = BulletinSemestriel::where('eleve_id', $user->id)
            ->where('semestre', $semestre)
            ->where('annee', $annee)
            ->get();

        if ($bulletins->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Aucun bulletin trouvé.'
            ], 404);
        }

        // Formatter les données pour la réponse JSON
        $result = $bulletins->map(function ($bulletin) {
            return [
                'id' => $bulletin->id,
                'nom' => $bulletin->nom,
                'semestre' => $bulletin->semestre,
                'annee' => $bulletin->annee,
                'moyenne' => $bulletin->moyenne,
                'classement' => $bulletin->classement,
                'pdf_url' => $bulletin->pdf_url
            ];
        });

        return response()->json([
            'code' => 200,
            'message' => 'Bulletins retrouvés avec succès.',
            'annee' => $annee,
            'bulletins' => $result
        ], 200);
    }
}