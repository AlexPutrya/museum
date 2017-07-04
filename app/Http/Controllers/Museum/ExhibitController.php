<?php
namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Texts;

class ExhibitController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ExhibitController
    |--------------------------------------------------------------------------
    |
    | Контроллер загрузки страницы экспоната на определенном языке
    |
    */
    public function __invoke($id)
    {
        $texts = new Texts();
        return view('museum.exhibit', ['exhibits' => $texts->get_exhibits_nav()]);
    }
}
