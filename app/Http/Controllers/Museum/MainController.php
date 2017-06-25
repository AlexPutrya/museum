<?php
namespace App\Http\Controllers\Museum;

use App;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function __invoke()
    {
        return view('museum.main');
    }
}
