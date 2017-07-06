<?php
namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Exhibits;

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
        $table = new Exhibits();
        return view('museum.main', ['nav_exhibits' => $table->get_visibility_exhibits()]);
    }
}
