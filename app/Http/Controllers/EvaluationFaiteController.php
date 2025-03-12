<?php

namespace App\Http\Controllers;

use App\Models\evaluation_faite;
use Illuminate\Http\Request;
use App\Models\User;

class EvaluationFaiteController extends Controller
{
    public function getEvaluationFaite(Request $request, $ien)
    {
        // Vérifier si l'élève avec cet IEN existe
        $user = User::where('ien', $ien)->first();

        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'Pas d Evaluation faite avec cet IEN.'
            ], 404);
        }

        // Récupérer toutes les evaluations associées à cet élève
        $evaluations = evaluation_faite::where('eleve_id', $user->id)->get();

        // Vérifier si l'élève a des evaluations deja faites
        if ($evaluations->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Aucune evaluation deja fait pour cet élève.'
            ], 404);
        }

        // Transformer les evaluations en un format lisible
        $result = $evaluations->map(function ($evaluation) {
            return [
                'id' => $evaluation->id,
                'nom' => $evaluation->nom,
                'note' => $evaluation->note,
                'date' => $evaluation->date,
                'heure' => $evaluation->heure,
                'created_at' => $evaluation->created_at,
                'updated_at' => $evaluation->updated_at,
            ];
        });

        // Retourner la liste des evaluations deja faite associées à l'élève
        return response()->json([
            'code' => 200,
            'message' => 'Evaluations récupérées avec succès.',
            'evaluations' => $result,
        ], 200);
    }
}