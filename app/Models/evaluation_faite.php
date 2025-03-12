<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluation_faite extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve_id',
        'nom',
        'note',
        'date',
        'heure'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}