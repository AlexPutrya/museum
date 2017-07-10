<?php

namespace App\Helpers;

use App;
use App\Exhibits;

class Navbar {

    public static function categories(){
        $lang = App::getLocale();
        $exhibits = Exhibits::where('visibility', 1)->get();
        $nav = [];
        foreach ($exhibits as $exhibit) {
            $text = $exhibit->text()->where('lang', $lang)->first();
            if(isset($text->name)){
                $nav[] = ['id'=>$exhibit->id, 'name'=>$text->name];
            }
        }
        return $nav;
    }
}
