<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exhibits;
use App\Texts;

class ExhibitsController extends Controller {

    //Получаем данные из 2-х таблиц и подготавливаем в массив
    public function get_exhibits(){
        $exhibits = Exhibits::all();
        $data = [];
        foreach ($exhibits as $exhibit) {
            $text = $exhibit->text()->where('lang', 'ru')->first();
            $data[] = ['id'=> $exhibit->id, 'visibility' => $exhibit->visibility, 'name' => $text->name ];
        }
        return response($data, 200);
    }

    //Получть тексты экспоната
    public function get_exhibit($id){
        $exhibit = Exhibits::find($id);
        // return $exhibit->text()->get();
        return response(['text'=>$exhibit->text()->get(), 'img_path'=>$exhibit->img_path, 'link_3dmodel'=>$exhibit->link_3dmodel]);
    }

    // Изменяем видимость экспонат
    public function visibility($id){
        $exhibit = Exhibits::where('id', $id)->first();
        if ($exhibit->visibility == 1){
            $exhibit->visibility = 0;
        }else{
            $exhibit->visibility = 1;
        }
        $exhibit->save();
        return response('', 200);
    }

    //Создаем экспонат и тексты к нему
    public function create(Request $request){
        $data = $request->input('locale');
        $exhibit = Exhibits::create();
        $exhibit->text()->saveMany([
            new Texts(['lang'=>'ru', 'title'=>'', 'text'=>'', 'name'=>'...']),
            new Texts(['lang'=>'en', 'title'=>'', 'text'=>'', 'name'=>'...']),
            new Texts(['lang'=>'ua', 'title'=>'', 'text'=>'', 'name'=>'...'])
        ]);
        return response(['id'=>$exhibit->id], 200);
    }

    //Редакитуем текст экспонат, пребираем цикл с данными где ключ => язык
    public function edit(Request $request, $id){
        $data = $request->input('locale');
        $link = $request->input('link_3dmodel');
        $exhibit = Exhibits::find($id);
        foreach ($data as $key => $value) {
            $text = $exhibit->text()->where('lang', $key)->first();
            $text->title = $data[$key]['title'];
            $text->text = $data[$key]['text'];
            $text->name = $data[$key]['name'];
            $text->save();
        }
        $exhibit->link_3dmodel = $link;
        $exhibit->save();
        return response('', 200);
    }

    // Удаляем экспонат файл изображения привязанный к нему
    public function delete($id){
        $exhibit = Exhibits::find($id);
        if($exhibit->img_path != null){
            Storage::delete('public'.$exhibit->img_path);
        }
        $exhibit->text()->delete();
        $exhibit->delete();
        return response('', 204);
    }
}
