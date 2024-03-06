<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoeudLora extends Model
{
    use HasFactory;

    public function Parking(){
        return $this->belongsTo(Parking::class,'parking_id');
    }
}
