<?php

namespace App\Http\Controllers;

use App\Models\ListeAbsenceRetard;
use Illuminate\Http\Request;
use App\Models\User;

class ListeAbsenceRetardController extends Controller
{
    public function getListeAbsenceRetard(Request $request, $ien)
    {
        // Vérifier si l'élève avec cet IEN existe
        $user = User::where('ien', $ien)->first();

        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'Absences et retards introuvable avec cet IEN.'
            ], 404);
        }

        // Récupérer la liste des absences et des retards associés à cet élève
        $absences_retards = ListeAbsenceRetard::where('eleve_id', $user->id)->get();

        // Vérifier si l'élève a des absences et des retards
        if ($absences_retards->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Aucun absence et retard trouvé pour cet élève.'
            ], 404);
        }

        // Transformer la liste des absences et des retards en un format lisible
        $result = $absences_retards->map(function ($absence_retard) {
            return [
                'id' => $absence_retard->id,
                'type' => $absence_retard->type,
                'date' => $absence_retard->date,
                'heure' => $absence_retard->heure,
                'discipline' => $absence_retard->discipline,
                'justification' => $absence_retard->justification,
                'created_at' => $absence_retard->created_at,
                'updated_at' => $absence_retard->updated_at,
            ];
        });

        // Retourner la liste des absences et des retards associés à l'élève
        return response()->json([
            'code' => 200,
            'message' => 'La liste des absences et des retards récupérées avec succès.',
            'Liste des absences et retards' => $result,
        ], 200);
    }
}