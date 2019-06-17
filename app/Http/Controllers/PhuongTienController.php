<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tour;
use App\PhuongTien;

class PhuongTienController extends Controller
{
    public function getList(){
        $phuongtien = phuongtien::all();
        return view('admin.phuongtien.list',['phuongtien'=>$phuongtien]);
    }

    public function getAdd(){
        return view('admin.phuongtien.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
        ['ten'=>'required|min:3|max:50|unique:PhuongTien'],
        ['ten.required'=>'Chưa nhập tên loại tour',
         'ten.min'=>'Tên phải lớn hơn 3 kí tự',
         'ten.max'=>'Tên phải bé hơn 50 kí tự']
        );

        $phuongtien = new PhuongTien;
        $phuongtien->ten = $request->ten;
        // $phuongtien->tenkhongdau = changeTitle($request->ten);
        $phuongtien->save();
        return redirect('admin/phuongtien/add')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
        $phuongtien = PhuongTien::find($id);
        return view('admin.phuongtien.edit',['phuongtien'=>$phuongtien]);
    }
    public function postEdit(Request $request,$id){
        $phuongtien = PhuongTien::find($id);
        $this->validate($request,
        ['ten'=>'required|unique:PhuongTien,ten|min:3|max:50'],
        [
            'ten.required'=>'Chưa nhập tên loại tour',
            'ten.min'=>'Tên phải lớn hơn 3 kí tự',
            'ten.max'=>'Tên phải bé hơn 50 kí tự'
        ]);
        $phuongtien->ten = $request->ten;
        $phuongtien->save();
        return redirect('admin/phuongtien/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getDelete($id){
        $phuongtien = PhuongTien::find($id);
        $phuongtien->delete();

        return redirect('admin/phuongtien/list')->with('thongbao','Xóa thành công');
    }
}
