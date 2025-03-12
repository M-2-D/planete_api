<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\User; // Ajout de l'importation du modèle User
use Illuminate\Http\Request;

class PlanningController extends Controller
{

     public function getPlanning(Request $request, $ien, $date)
     {
         // Vérifier si l'utilisateur (élève) avec cet IEN existe
         $user = User::where('ien', $ien)->first();
     
         if (!$user) {
             return response()->json([
                 'code' => 401,
                 'message' => 'Planning Introuvable.'
             ], 401);
         }
     
         // Récupérer tous les plannings associés à cet élève pour la date donnée
         $plannings = Planning::where('eleve_id', $user->id)
                             ->whereDate('date', $date)
                             ->get();
     
         if ($plannings->isEmpty()) {
             return response()->json([
                 'code' => 401,
                 'message' => 'Planning Introuvable.'
             ], 401);
         }
     
         // Mapper les plannings pour retourner les informations sous forme de tableau
         $result = $plannings->map(function ($planning) {
             return [
                 'heure' => $planning->heure,
                 'discipline' => $planning->discipline,
                 'classe' => $planning->classe,
                 'salle' => $planning->salle,
             ];
         });
     
         // Retourner la réponse avec tous les plannings trouvés
         return response()->json([
             'code' => 200,
             'message' => 'Planning retrouvé avec succès.',
             'date' => $plannings->first()->date, // La date à laquelle les plannings sont associés
             'plannings' => $result, // Retourne la liste des plannings pour cette date
         ], 200);
     }
     
}
