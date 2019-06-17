<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
    protected $table = "hoadon";

    public function ct_tour(){
        return $this->belongsTo('App\CT_TOUR','idct_tour','id');
    }
    public function khachhang(){
        return $this->belongsTo('App\KhachHang','idkh','id');
    }
}
