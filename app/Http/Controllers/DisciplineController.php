<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\User;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function getListDisciplines(Request $request, $ien)
    {
        // Vérifier que l'utilisateur (élève) avec cet IEN existe
        $user = User::where('ien', $ien)->first();

        if (!$user) {
            return response()->json([
                'code' => 404,
                'message' => 'Élève non trouvé.'
            ], 404);
        }

        // Récupérer les disciplines associées à l'élève
        $disciplines = Discipline::all();

        if ($disciplines->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Aucune discipline trouvée.'
            ], 404);
        }

        // Si disciplines trouvées, les retourner dans la réponse
        return response()->json([
            'code' => 200,
            'message' => 'Liste des disciplines retrouvées avec succès.',
            'disciplines' => $disciplines
        ], 200);
    }
}
