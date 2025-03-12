<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenneSemestrielles extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve_id',
        'discipline',
        'moy_devoirs',
        'notes_compos',
        'moyenne',
        'rang',
        'appreciation',
        'semestre',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
