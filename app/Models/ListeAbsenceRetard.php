<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeAbsenceRetard extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve_id',
        'type',
        'date',
        'heure',
        'discipline',
        'justification'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}