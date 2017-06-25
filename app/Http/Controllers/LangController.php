<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class LangController extends Controller
{
    public function switchLang($lang)
    {
        Session::put('applocale', $lang);
        return Redirect::back();
    }
}
