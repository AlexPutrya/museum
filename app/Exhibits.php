<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Exhibits extends Model
{
    public function texts(){
        $lang = App::getLocale();
        return $this->hasOne("App\Texts", "exhibit_id")->select('name')->where('lang', $lang);
    }

    public function get_exhibits(){
        return $this->all();
    }
}
