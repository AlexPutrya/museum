<?php

namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Exhibits;
use App\Helpers\Navbar;
use App;
use Illuminate\Http\Request;

class PageController extends Controller {

    public function main(){
        return view('museum.main', ['nav_exhibits' => Navbar::categories()]);
    }

    public function exhibit($id){
        $lang = App::getLocale();
        $exhibit = Exhibits::find($id);
        $info = $exhibit->text()->where('lang', $lang)->first();
        return view('museum.exhibit', ['nav_exhibits' => Navbar::categories(), 'info' => $info, 'img_path'=>$exhibit->img_path]);
    }

    public function test(Request $request, $id){
        if ($request->isMethod('post')){
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename =  $file->getClientOriginalName();
                $file->move(public_path() . '/img/exhibits/',$filename);
                if($filename){
                    $exhibit = Exhibits::find($id);
                    $exhibit->img_path = "/img/exhibits/".$filename;
                    $exhibit->save();
                }
            }
        }
        // $exhibit = Exhibits::find($id);
        // return $exhibit->text()->get();
        // $exhibit = Exhibits::find($id);
        // $exhibit->text()->delete();
        // $exhibit->delete();
        // return response('', 204);
    }
}
