<?php

namespace App\Domains\Mission\Models;

use App\Domains\Mission\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    public $fillable = ['libele'];

    public function depart()
    {
        return $this->belongsTo(Region::class, 'depart_id');
    }

    public function arrive()
    {
        return $this->belongsTo(Region::class, 'arrive_id');
    }
}
