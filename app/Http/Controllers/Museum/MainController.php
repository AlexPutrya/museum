<?php
namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Exhibits;
use App\Texts;

class MainController extends Controller
{
    public function __invoke()
    {
        $texts = Texts::where('lang', 'ru')->get();
        return view('museum.main', ['texts' => $texts]);
    }
}
