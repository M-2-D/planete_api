<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationProgrammee extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve_id',
        'nom',
        'note',
        'description',
        'salle',
        'date',
        'heure'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}