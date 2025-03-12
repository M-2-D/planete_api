<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $fillable = [
        'eleve_id', 
        'discipline',
        'classe',
        'salle',
        'heure',
        'date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
