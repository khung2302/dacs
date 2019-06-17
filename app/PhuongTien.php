<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuongTien extends Model
{
    //
    protected $table = "phuongtien";

    public function ct_tour(){
        return $this->hasMany('App\CT_Tour','idphuongtien','id');
    }
}
