<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibits extends Model
{
    public function texts(){
        return $this->hasMany("App\Texts", "exhibit_id");
    }
}
