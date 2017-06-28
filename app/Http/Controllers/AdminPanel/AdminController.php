<?php
namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __invoke()
    {
        return view('adminpanel.index');
    }
}
