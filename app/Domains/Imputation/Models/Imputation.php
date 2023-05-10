<?php

namespace App\Domains\Imputation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imputation extends Model
{
    use HasFactory;

    protected $fillable = ['sick_name','agent', 'email','phone','registration_number','service'];

    public const LOAD_EMPLOYE = 0.2;
    public const LOAD_EMPLOYER = 0.8;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($imputation) {
            $imputation->phone =  (int) (221 . $imputation->phone);
        });
    }
}
