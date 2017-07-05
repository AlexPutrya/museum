<?php
namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Exhibits;

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
        $table = new Exhibits();
        return view('museum.exhibit', ['nav_exhibits' => $table->get_visibility_exhibits()]);
    }
}
