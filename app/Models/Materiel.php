<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materiel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'designation',
        'marque',
        'modell',
        'serialnumber',
        'etat',
        'commentaire',
        'status',

    ];

    public function attribution()
    {
        return $this->belongsTo(Attribution::class);
    }

}
