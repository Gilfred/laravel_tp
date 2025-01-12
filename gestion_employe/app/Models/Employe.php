<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'position', 'departement_id'];
    public function departement(){
        return $this->belongsTo(Departement::class );
}
}


