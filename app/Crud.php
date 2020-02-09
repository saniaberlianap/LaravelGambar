<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = [
    	'first_name', 'last_name','ortu_id', 'image'
    ];

    protected $table = 'sample_data';

    public function ortu(){
    	return $this->belongsTo(Ortu::class);
    }
}
