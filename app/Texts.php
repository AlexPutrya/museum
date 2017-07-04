<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Texts extends Model
{
    public function exhibits(){
        return $this->belongsTo('App\Exhibits', 'id');
    }

    // Получаем данные для навигационного меню на основании локали
    public function get_exhibits_nav(){
        $locale = App::getLocale();
        return $exhibits_nav = $this->where('lang', $locale)->get();
    }
}
