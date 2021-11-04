<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribution extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_materiel',
        'id_accessoire',
        'id_employe',
        'commentaire',
        'attribute_at',
    ];

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }

    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }

    public function accessoires()
    {
        return $this->hasMany(Accessoire::class);
    }


}
