<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    //
    protected $table = "tour";

    public function loaitour(){
        return $this->belongsTo('App\LoaiTour','idloaitour','id');
    }
    public function ct_tour(){
        return $this->hasMany('App\CT_Tour','idtour','id');
    }
}
