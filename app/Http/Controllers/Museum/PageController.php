<?php

namespace App\Http\Controllers\Museum;

use App\Http\Controllers\Controller;
use App\Exhibits;
use App\Helpers\Navbar;
use App;
use Illuminate\Http\Request;

class PageController extends Controller {

    public function main(){
        $data = Exhibits::where('visibility', 1)->take(3)->get();
        $exhibits = [];
        $text = '';
        foreach ($data as $value) {
            $info = $value->text()->where('lang', App::getLocale())->first();
            if($info->text != null or $info->text != ''){
                $text = substr($info->text, 0, 500);
            }
            $text .= '...';
            $exhibits[] = ['img_path'=>$value->img_path, 'title'=>$info->title, 'text'=>$text];
        }
        return view('museum.main', ['nav_exhibits' => Navbar::categories(), 'exhibits' => $exhibits]);
    }

    public function exhibit($id){
        $lang = App::getLocale();
        $exhibit = Exhibits::find($id);
        $info = $exhibit->text()->where('lang', $lang)->first();
        return view('museum.exhibit', ['nav_exhibits' => Navbar::categories(), 'info' => $info, 'img_path'=>$exhibit->img_path]);
    }

    // public function test(Request $request, $id){
    //     if ($request->isMethod('post')){
    //         if($request->hasFile('image')){
    //             $file = $request->file('image');
    //             $filename =  $file->getClientOriginalName();
    //             $file->move(public_path() . '/img/exhibits/',$filename);
    //             if($filename){
    //                 $exhibit = Exhibits::find($id);
    //                 $exhibit->img_path = "/img/exhibits/".$filename;
    //                 $exhibit->save();
    //             }
    //         }
    //     }
    // }
}
