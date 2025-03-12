<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElevesController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\EvaluationFaiteController;
use App\Http\Controllers\EvaluationProgrammeeController;
use App\Http\Controllers\EmploiDuTempsController;
use App\Http\Controllers\ListeAbsenceRetardController;
use App\Http\Controllers\MoyenneSemestriellesController;
use App\Http\Controllers\BulletinSemestrielController;




Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/liste_eleves', [ElevesController::class, 'index']);
    Route::get('planning/{ien}/{date}', [PlanningController::class, 'getPlanning']);
    Route::get('liste_disciplines/{ien}', [DisciplineController::class, 'getListDisciplines']);
    Route::get('evaluation_faite/{ien}', [EvaluationFaiteController::class, 'getEvaluationFaite']);
    Route::get('evaluation_programmee/{ien}', [EvaluationProgrammeeController::class, 'getEvaluationProgrammee']);
    Route::get('emploi_du_temps/{ien}', [EmploiDuTempsController::class, 'getEmploiDuTemps']);
    Route::post('/changer_mdp', [AuthController::class, 'changerMotDePasse']);
    Route::get('absence_retard/{ien}', [ListeAbsenceRetardController::class, 'getListeAbsenceRetard']);
    Route::get('/moyennes_semestrielles/{ien}/{semestre}', [MoyenneSemestriellesController::class, 'index']);
    Route::get('bulletins/{ien}/{semestre}/{annee}', [BulletinSemestrielController::class, 'getBulletins']);

}); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
