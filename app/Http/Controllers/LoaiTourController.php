<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTour;

class LoaiTourController extends Controller
{
    //
    public function getList(){
        $loaitour = LoaiTour::all();
        return view('admin.loaitour.list',['loaitour'=>$loaitour]);
    }

    public function getAdd(){
        return view('admin.loaitour.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
        ['ten'=>'required|min:3|max:50|unique:LoaiTour'],
        ['ten.required'=>'Chưa nhập tên loại tour',
         'ten.min'=>'Tên phải lớn hơn 3 kí tự',
         'ten.max'=>'Tên phải bé hơn 50 kí tự']
        );

        $loaitour = new LoaiTour;
        $loaitour->ten = $request->ten;
        // $loaitour->tenkhongdau = changeTitle($request->ten);
        $loaitour->save();
        return redirect('admin/loaitour/add')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
        $loaitour = LoaiTour::find($id);
        return view('admin.loaitour.edit',['loaitour'=>$loaitour]);
    }
    public function postEdit(Request $request,$id){
        $loaitour = LoaiTour::find($id);
        $this->validate($request,
        ['ten'=>'required|unique:LoaiTour,ten|min:3|max:50'],
        [
            'ten.required'=>'Chưa nhập tên loại tour',
            'ten.min'=>'Tên phải lớn hơn 3 kí tự',
            'ten.max'=>'Tên phải bé hơn 50 kí tự'
        ]);
        $loaitour->ten = $request->ten;
        $loaitour->save();
        return redirect('admin/loaitour/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getDelete($id){
        $loaitour = LoaiTour::find($id);
        $loaitour->delete();

        return redirect('admin/loaitour/list')->with('thongbao','Xóa thành công');
    }
}
