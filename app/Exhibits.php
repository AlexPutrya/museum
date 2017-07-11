<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibits extends Model
{
    public $timestamps = false;

    public function text(){
        return $this->hasMany("App\Texts", "exhibit_id");
    }
}
