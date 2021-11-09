<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accessoire extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'access_name',
        'access_etat',
        'access_commentaire',
    ];


    public function attribution()
    {
        return $this->belongsTo(Attribution::class);
    }


}



