<?php

namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Exhibits;
use App\Helpers\Navbar;
use App;

class PageController extends Controller {

    public function main(){
        return view('museum.main', ['nav_exhibits' => Navbar::categories()]);
    }

    public function exhibit($id){
        $lang = App::getLocale();
        $exhibit = Exhibits::find($id);
        $info = $exhibit->text()->where('lang', $lang)->first();
        return view('museum.exhibit', ['nav_exhibits' => Navbar::categories(), 'info' => $info]);
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
