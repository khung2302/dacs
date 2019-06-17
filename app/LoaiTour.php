<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTour extends Model
{
    //
    protected $table = "loaitour";

    public function tour(){
        return $this->hasMany('App\Tour','idloaitour','id');
    }

    public function ct_tour(){
        return $this->hasManyThrough('App\CT_Tour','App\Tour','idloaitour','idtour','id');
    }
}
