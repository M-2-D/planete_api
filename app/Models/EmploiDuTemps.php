<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiDuTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve_id',
        'date',
        'discipline',
        'heure',
        'professeur',
        'salle',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}