<?php
namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Texts;

class MainController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MainController
    |--------------------------------------------------------------------------
    |
    | Контроллер для главной страницы
    |
    */
    public function __invoke()
    {
        $texts = new Texts();
        return view('museum.main', ['exhibits' => $texts->get_exhibits_nav()]);
    }
}
