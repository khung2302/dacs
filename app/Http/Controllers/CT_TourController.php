<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTour;
use App\Tour;
use App\CT_Tour;
use App\PhuongTien;
use App\KhuyenMai;

class CT_TourController extends Controller
{
    //
    public function getList(){
    //    $cttour = CT_Tour::orderBy('id','DESC')->get();
        $ct_tour = CT_Tour::all();
        return view('admin.ct_tour.list',['ct_tour'=>$ct_tour]);
    }

    public function getAdd(){
        $loaitour = LoaiTour::all();
        $tour = Tour::all();
        $phuongtien = PhuongTien::all();
        $khuyenmai = KhuyenMai::all();
        return view('admin.ct_tour.add',['loaitour'=>$loaitour,'tour'=>$tour,'phuongtien'=>$phuongtien,'khuyenmai'=>$khuyenmai]);
        
    }
    public function postAdd(Request $request){
        $this->validate($request,
        [
            // 'LoaiTour'=>'required',
            'tour'=>'required',
            'phuongtien'=>'required',
            'ten'=>'required|min:3|max:50|unique:CT_Tour',
            'ngaykhoihanh'=>'required',
            'diemkhoihanh'=>'required',
            'thoigiandi'=>'required',
            'giatien'=>'required|integer|min:6',
            'noidung'=>'required'
        ],
        [
        //  'LoaiTour.required'=>'Chưa chọn loại tour', 
         'tour.required'=>'Chưa chọn tour',
         'phuongtien.required'=>'Chưa chọn phương tiện',   
         'ten.required'=>'Chưa nhập thông tin',
         'ten.min'=>'Tên phải lớn hơn 3 kí tự',
         'ten.max'=>'Tên phải bé hơn 50 kí tự',
         'ngaykhoihanh.required'=>'Chưa nhập thông tin ngày khởi hành',
         'diemkhoihanh.required'=>'Chưa nhập thông tin điểm khởi hành',
         'thoigiandi.required'=>'Chưa nhập thông tin thoi gian đi   ',
         'giatien.integer'=>'Giá tiền phải là số', 
         'giatien.min'=>'Giá tiền phải lớn hơn 100.000 VNĐ',
         'noidung.required'=>'Chưa nhập nội dung'
        ]);

        $ct_tour = new CT_Tour;
        $ct_tour->idtour = $request->tour;
        $ct_tour->idphuongtien = $request->phuongtien;
        $ct_tour->ten = $request->ten;
        $ct_tour->ngaykhoihanh = $request->ngaykhoihanh;    
        $ct_tour->diemkhoihanh = $request->diemkhoihanh;
        $ct_tour->thoigiandi = $request->thoigiandi;
        $ct_tour->idkhuyenmai = $request->khuyenmai;
        $ct_tour->giatien = $request->giatien;
        $ct_tour->noidung = $request->noidung;
        // $loaitour->tenkhongdau = changeTitle($request->ten);
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg' && $tail != 'webp') {
                return redirect('admin/ct_tour/add')->with('loi','Chỉ được thêm file jpg, png, jpeg, webp');
            }
            $name = $file->getClientOriginalName();
            $hinhanh = str_random(4)."_". $name;
            while(file_exists("upload/ct_tour/".$hinhanh)){
                $hinhanh = str_random(4)."_". $name;
            }
            $file->move("upload/ct_tour",$hinhanh);
            $ct_tour->hinhanh = $hinhanh;
        }
        else{
            $ct_tour->hinhanh = "";
        }
        $ct_tour->save();
        return redirect('admin/ct_tour/add')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
        $loaitour = LoaiTour::all();
        $tour = Tour::all();
        $phuongtien = PhuongTien::all();
        $khuyenmai = KhuyenMai::all();
        $ct_tour = CT_Tour::find($id);
        return view('admin.ct_tour.edit',
        [
            'ct_tour'=>$ct_tour,
            'loaitour'=>$loaitour,
            'tour'=>$tour,
            'phuongtien'=>$phuongtien,
            'khuyenmai'=>$khuyenmai
        ]);
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,
        [
            // 'LoaiTour'=>'required',
            'tour'=>'required',
            'phuongtien'=>'required',
            'ten'=>'required|min:3|max:50|unique:CT_Tour',
            'ngaykhoihanh'=>'required',
            'diemkhoihanh'=>'required',
            'thoigiandi'=>'required',
            'giatien'=>'required|integer|min:6',
            'noidung'=>'required'
        ],
        [
        //  'LoaiTour.required'=>'Chưa chọn loại tour', 
         'tour.required'=>'Chưa chọn tour',
         'phuongtien.required'=>'Chưa chọn phương tiện',   
         'ten.required'=>'Chưa nhập thông tin',
         'ten.min'=>'Tên phải lớn hơn 3 kí tự',
         'ten.max'=>'Tên phải bé hơn 50 kí tự',
         'ngaykhoihanh.required'=>'Chưa nhập thông tin ngày khởi hành',
         'diemkhoihanh.required'=>'Chưa nhập thông tin điểm khởi hành',
         'thoigiandi.required'=>'Chưa nhập thông tin thoi gian đi   ',
         'giatien.integer'=>'Giá tiền phải là số', 
         'giatien.min'=>'Giá tiền phải lớn hơn 100.000 VNĐ',
         'noidung.required'=>'Chưa nhập nội dung'
        ]);

        $ct_tour->idtour = $request->tour;
        $ct_tour->idphuongtien = $request->phuongtien;
        $ct_tour->ten = $request->ten;
        $ct_tour->ngaykhoihanh = $request->ngaykhoihanh;    
        $ct_tour->diemkhoihanh = $request->diemkhoihanh;
        $ct_tour->thoigiandi = $request->thoigiandi;
        $ct_tour->idkhuyenmai = $request->khuyenmai;
        $ct_tour->giatien = $request->giatien;
        $ct_tour->noidung = $request->noidung;
        // $loaitour->tenkhongdau = changeTitle($request->ten);
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $tail = $file->getClientOriginalExtension();
            if ($tail != 'jpg' && $tail != 'png' && $tail != 'jpeg' && $tail != 'webp') {
                return redirect('admin/ct_tour/add')->with('loi','Chỉ được thêm file jpg, png, jpeg, webp');
            }
            $name = $file->getClientOriginalName();
            $hinhanh = str_random(4)."_". $name;
            while(file_exists("upload/ct_tour/".$hinhanh)){
                $hinhanh = str_random(4)."_". $name;
            }
            $file->move("upload/ct_tour",$hinhanh);
            unlink("upload/ct_tour/".$hinhanh);
            $ct_tour->hinhanh = $hinhanh;
        }
        $ct_tour->save();
        return redirect('admin/ct_tour/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getDelete($id){
       $ct_tour = CT_Tour::find($id);
       $ct_tour->delete();
       return redirect('admin/ct_tour/list')->with('thongbao','Xóa thành công');
    }
}
