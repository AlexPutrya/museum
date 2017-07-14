<?php
namespace App\Http\Controllers\Api;

use App\Exhibits;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller {

    // Сохранение фотографии
    public function save(Request $request, $id){
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
            return response('', 200);
        }
    }

    // Удаление изображения привязаного к экспонату и пути
    public function delete($id){
        $exhibit = Exhibits::find($id);
        Storage::delete($exhibit->img_path);
        $exhibit->img_path = "";
        $exhibit->save();
        return response('', 204);
    }
}
