<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class LangController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LangController
    |--------------------------------------------------------------------------
    |
    | Контроллер проверяет есть ли в конфиге запрошенный язык
    | и устанавливает сессионную перменную
    | для дальнейшего использования в Middleware\Language
    |
    */
    public function switchLang($lang)
    {
        if(array_key_exists($lang, Config::get('languages'))){
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
}
