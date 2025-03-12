<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinSemestriel extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve_id',
        'nom',
        'semestre',
        'annee',
        'moyenne',
        'classement',
        'pdf_url'
    ];

    public function eleve()
    {
        return $this->belongsTo(User::class, 'eleve_id');
    }
    
    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/
}