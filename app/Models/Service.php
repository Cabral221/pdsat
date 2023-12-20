<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Imputation\Models\Imputation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    public $fillable = ['libele', 'cigle'];

    public function imputations()
    {
        return $this->hasMany(Imputation::class);
    }
}
