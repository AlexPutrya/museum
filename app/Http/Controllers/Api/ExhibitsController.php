<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Exhibits;

class ExhibitsController extends Controller {

    //Получаем данные из 2-х таблиц и подготавливаем в массив 
    public function get_exhibits(){
        $table = new Exhibits();
        foreach ($table->get_exhibits() as $exhibit) {
            $data[] = ['id'=> $exhibit->id, 'visibility' => $exhibit->visibility, 'name' => $exhibit->texts->name ];
        }
        return $data;
    }
}
