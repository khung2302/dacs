@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi Tiết Tour
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>Ngày khởi hành</th>
                        <th>Điểm khởi hành</th>
                        <th>Phương tiện</th>
                        <th>Loại tuor</th>
                        <th>Thuộc tuor</th>
                        <th>Giá tiền</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ct_tour as $ct)
                        <tr class="odd gradeX" align="center">
                            <td>{{$ct->id}}</td>
                            <td>{{$ct->ten}}</td>
                            <td>{{$ct->noidung}}</td>
                            <td><img width="100px" src="upload/ct_tour/{{$ct->hinhanh}}" alt=""></td>
                            <td>{{$ct->ngaykhoihanh}}</td>
                            <td>{{$ct->diemkhoihanh}}</td>
                            <td>{{$ct->phuongtien->ten}}</td>
                            <td>{{$ct->tour->loaitour->ten}}</td>
                            <td>{{$ct->tour->ten}}</td>
                            <td>{{$ct->giatien}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/ct_tour/delete/{{$ct->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/ct_tour/edit/{{$ct->id}}">Edit</a></td>
                        </tr>
                    @endforeach                  
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection