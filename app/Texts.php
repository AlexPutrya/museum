<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Texts extends Model
{
    public function exhibits(){
        return $this->hasOne('App\Exhibits', 'id');
    }
}
