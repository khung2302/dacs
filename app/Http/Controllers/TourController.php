<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTour;
use App\Tour;

class TourController extends Controller
{
    public function getList(){
        $tour = Tour::all();
        return view('admin.tour.list',['tour'=>$tour]);
    }

    public function getAdd(){
        return view('admin.tour.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
        [
            'ten'=>'required|min:3|max:50|unique:Tour',
            'idloaitour'=>'required'
        ],
        ['ten.required'=>'Chưa nhập tên tour',
         'ten.min'=>'Tên phải lớn hơn 3 kí tự',
         'ten.max'=>'Tên phải bé hơn 50 kí tự',
         'idloaitour.required'=>'Chưa nhập loại tour'
        ]);

        $tour = new Tour;
        $tour->ten = $request->ten;
        $tour->idloaitour = $request->idloaitour;
        // $loaitour->tenkhongdau = changeTitle($request->ten);
        $tour->save();
        return redirect('admin/tour/add')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
        $tour = Tour::find($id);
        return view('admin.tour.edit',['tour'=>$tour]);
    }
    public function postEdit(Request $request,$id){
        $tour = Tour::find($id);
        $this->validate($request,
        [
            'ten'=>'required|min:3|max:50|unique:Tour',
            'idloaitour'=>'required'
        ],
        ['ten.required'=>'Chưa nhập tên tour',
         'ten.min'=>'Tên phải lớn hơn 3 kí tự',
         'ten.max'=>'Tên phải bé hơn 50 kí tự',
         'idloaitour.required'=>'Chưa nhập loại tour'
        ]);

        $tour->ten = $request->ten;
        $tour->idloaitour = $request->idloaitour;
        $tour->save();
        return redirect('admin/tour/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getDelete($id){
        $tour = Tour::find($id);
        $tour->delete();

        return redirect('admin/tour/list')->with('thongbao','Xóa thành công');
    }
}
