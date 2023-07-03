<?php

namespace App\Domains\Imputation\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ImputationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Imputation extends Model
{
    use HasFactory;

    protected $fillable = ['sick_name', 'agent', 'email', 'phone', 'registration_number', 'service', 'fonction' ,'status'];

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

     /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ImputationFactory::new();
    }
}
