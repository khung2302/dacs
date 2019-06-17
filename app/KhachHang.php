<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $table = "khachhang";

    public function hoadon(){
        return $this->hasMany('App\HoaDon','idkh','id');
    }
}
