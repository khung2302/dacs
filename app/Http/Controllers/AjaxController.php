<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTour;
use App\Tour;
use App\CT_Tour;

class AjaxController extends Controller
{
    //
    public function getTour($idloaitour){
        $tour = Tour::where("idloaitour",$idloaitour)->get();
        foreach ($tour as $t) {
            echo "<option value='".$t->id."'>".$t->ten."</option>";
        }
    }
}

?>