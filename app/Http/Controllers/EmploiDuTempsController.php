<?php

namespace App\Http\Controllers;

use App\Models\EmploiDuTemps;
use Illuminate\Http\Request;
use App\Models\User;

class EmploiDuTempsController extends Controller
{
    public function getEmploiDuTemps(Request $request, $ien)
    {
        // Vérifier si l'élève avec cet IEN existe
        $user = User::where('ien', $ien)->first();

        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'Aucun emploi temps trouvé.'
            ], 404);
        }

        // Récupérer l'emploi du temps associées à cet élève
        $emploidutemps = EmploiDuTemps::where('eleve_id', $user->id)->get();

        // Vérifier si l'élève a un emploi du temps
        if ($emploidutemps->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Pas d emploi du temps pour cet élève.'
            ], 404);
        }

        // Transformer l emploi du temps en un format lisible
        $result = $emploidutemps->map(function ($emploidutemp) {
            return [
                'id' => $emploidutemp->id,
                'date' => $emploidutemp->date,
                'discipline' => $emploidutemp->discipline,
                'heure' => $emploidutemp->heure,
                'professeur' => $emploidutemp->professeur,
                'salle' => $emploidutemp->salle,
                'created_at' => $emploidutemp->created_at,
                'updated_at' => $emploidutemp->updated_at,
            ];
        });

        // Retourner l emploi du temps associées à l'élève
        return response()->json([
            'code' => 200,
            'message' => 'Emploi du temps récupéré avec succès.',
            'emploi du temps' => $result,
        ], 200);
    }
}