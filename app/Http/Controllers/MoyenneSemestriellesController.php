<?php

namespace App\Http\Controllers;

use App\Models\MoyenneSemestrielles;
use App\Models\User; 
use Illuminate\Http\Request;

class MoyenneSemestriellesController extends Controller
{
    public function index($ien, $semestre)
    {
        $user = User::where('ien', $ien)->first();

        if (!$user) {
            return response()->json([
                "code" => 404,
                "message" => "Utilisateur introuvable."
            ], 404);
        }

        // Récupérer les moyennes du semestre demandé
        $moyennes = MoyenneSemestrielles::where('eleve_id', $user->id)
            ->where('semestre', $semestre)
            ->get();

        if ($moyennes->isEmpty()) {
            return response()->json([
                "code" => 404,
                "message" => "Aucune moyenne trouvée pour ce semestre."
            ], 404);
        }

        $result = $moyennes->map(function ($moyenne) {
            return [
                "id" => $moyenne->id,
                "discipline" => $moyenne->discipline,
                "moy_devoirs" => $moyenne->moy_devoirs,
                "notes_compos" => $moyenne->notes_compos,
                "moyenne" => $moyenne->moyenne,
                "rang" => $moyenne->rang,
                "appreciation" => $moyenne->appreciation,
                "semestre" => $moyenne->semestre,
                "created_at" => $moyenne->created_at,
                "updated_at" => $moyenne->updated_at,
            ];
        });

        return response()->json([
            "code" => 200,
            "message" => "Liste des moyennes semestrielles récupérées avec succès.",
            "prenom" => $user->prenom,
            "nom" => $user->nom,
            "semestre" => $semestre,
            "moyennes" => $result
        ]);
    }
}
