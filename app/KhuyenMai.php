<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    //
    protected $table = "khuyenmai";

    public function ct_tour(){
        return $this->hasMany('App\KhuyenMai','idct_tour','id');
    }
}
