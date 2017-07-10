<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exhibits;
use App\Texts;

class ExhibitsController extends Controller {

    //Получаем данные из 2-х таблиц и подготавливаем в массив
    public function get_exhibits(){
        $exhibits = Exhibits::all();
        foreach ($exhibits as $exhibit) {
            $text = $exhibit->text()->where('lang', 'ru')->first();
            $data[] = ['id'=> $exhibit->id, 'visibility' => $exhibit->visibility, 'name' => $text->name ];
        }
        return response($data, 200);
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
            new Texts(['lang'=>'ru', 'title'=>$data['ru']['title'], 'text'=>$data['ru']['text'], 'name'=>$data['ru']['name']]),
            new Texts(['lang'=>'en', 'title'=>$data['en']['title'], 'text'=>$data['en']['text'], 'name'=>$data['en']['name']]),
            new Texts(['lang'=>'ua', 'title'=>$data['ua']['title'], 'text'=>$data['ua']['text'], 'name'=>$data['ua']['name']])
        ]);
        return response('', 200);
    }

    // Удаляем єкспонат
    public function delete($id){
        $exhibit = Exhibits::find($id);
        $exhibit->text()->delete();
        $exhibit->delete();
        return response('', 204);
    }
}
