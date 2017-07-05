<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Exhibits;

class ExhibitsController extends Controller {
    protected $table;

    public function __construct(){
        $this->table = new Exhibits();
    }
    //Получаем данные из 2-х таблиц и подготавливаем в массив
    public function get_exhibits(){
        foreach ($this->table->get_all_exhibits() as $exhibit) {
            $data[] = ['id'=> $exhibit->id, 'visibility' => $exhibit->visibility, 'name' => $exhibit->texts->name ];
        }
        return response($data, 200);
    }
    // Изменяем видимость экспонат
    public function visibility($id){
        $this->table->change_visibility($id);
        return response('', 200);
    }
}
