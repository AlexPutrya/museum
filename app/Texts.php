<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Texts extends Model
{
    public $timestamps = false;
    protected $fillable = ['exhibit_id', 'lang', 'title', 'text', 'name'];
    
    public function exhibits(){
        return $this->hasOne('App\Exhibits', 'id');
    }
}
