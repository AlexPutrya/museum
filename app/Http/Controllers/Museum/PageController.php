<?php

namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Exhibits;
use App\Helpers\Navbar;

class PageController extends Controller {

    public function main(){
        return view('museum.main', ['nav_exhibits' => Navbar::categories()]);
    }

    public function exhibit(){
        $table = new Exhibits();
        return view('museum.exhibit', ['nav_exhibits' => Navbar::categories()]);
    }

    public function test($id){
        $exhibit = Exhibits::find($id);
        return $exhibit->text()->get();
        // $exhibit = Exhibits::find($id);
        // $exhibit->text()->delete();
        // $exhibit->delete();
        // return response('', 204);
    }
}
