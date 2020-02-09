<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
     protected $table = 'ortu';
    protected $fillable = [
    	'ayah', 'ibu', 'alamat'
    ];

    public function crud(){
    	return $this->hasMany(Crud::class);
    }
}
