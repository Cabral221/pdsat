<?php

namespace App\Domains\Mission\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = ['genre', 'name', 'fonction', 'matricule', 'matrimonial', 'depart_id', 'arrive_id',
                            'mission_id', 'date_depart', 'date_arrive', 'vehicule',
                            'carburant', 'nombre_personne'];
}
