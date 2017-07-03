<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texts extends Model
{
    public function exhibits(){
        return $this->belongsTo('App\Exhibits', 'id');
    }
}
