<?php

namespace App\Http\Controllers;

use App\Models\EvaluationProgrammee;
use Illuminate\Http\Request;
use App\Models\User;

class EvaluationProgrammeeController extends Controller
{
    public function getEvaluationProgrammee(Request $request, $ien)
    {
        // Vérifier si l'élève avec cet IEN existe
        $user = User::where('ien', $ien)->first();

        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'Pas d Evaluation prorammée avec cet IEN.'
            ], 404);
        }

        // Récupérer toutes les evaluations programmée associées à cet élève
        $evaluations = EvaluationProgrammee::where('eleve_id', $user->id)->get();

        // Vérifier si l'élève a des evaluations programmées
        if ($evaluations->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Aucune evaluation programmée pour cet élève.'
            ], 404);
        }

        // Transformer les evaluations en un format lisible
        $result = $evaluations->map(function ($evaluation) {
            return [
                'id' => $evaluation->id,
                'nom' => $evaluation->nom,
                'note' => $evaluation->note,
                'description' => $evaluation->description,
                'salle' => $evaluation->salle,
                'date' => $evaluation->date,
                'heure' => $evaluation->heure,
                'created_at' => $evaluation->created_at,
                'updated_at' => $evaluation->updated_at,
            ];
        });

        // Retourner la liste des evaluations programmées associées à l'élève
        return response()->json([
            'code' => 200,
            'message' => 'Evaluations récupérées avec succès.',
            'evaluations' => $result,
        ], 200);
    }
    
}