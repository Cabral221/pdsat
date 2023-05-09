<?php

namespace App\Domains\Imputation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imputation extends Model
{
    use HasFactory;

    protected $fillable = ['sick_name','agent','registration_number','service'];

    public const LOAD_EMPLOYE = 0.2;
    public const LOAD_EMPLOYER = 0.8;
}
