<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nomprenom',
        'email_request_at',
        'email_create_at',
        'email',
        'matricule',
        'respH',
        'ville',
        'status_reqtoIT',
        'status_crebyIT',
        'status_leave',
        'leave_at',
        'action_by',

    ];


    public function attribution()
    {
        return $this->belongsTo(Attribution::class);
    }
}
