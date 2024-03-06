<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    public function Ville(){
        return $this->belongsTo(Ville::class,'ville_id');
    }

    public function NoeudLora(){
        return $this->hasMany(NoeudLora::class,'parking_id');
    }
}
