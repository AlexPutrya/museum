<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Exhibits extends Model
{
    public $timestamps = false;

    public function texts(){
        $lang = App::getLocale();
        return $this->hasOne("App\Texts", "exhibit_id")->select('name')->where('lang', $lang);
    }

    public function get_visibility_exhibits(){
        return $this->where('visibility', 1)->get();
    }

    public function get_all_exhibits(){
        return $this->all();
    }

    public function change_visibility(int $id){
        $exhibit = $this->where('id', $id)->first();
        if ($exhibit->visibility == 1){
            $exhibit->visibility = 0;
        }else{
            $exhibit->visibility = 1;
        }
        $exhibit->save();
    }

}
