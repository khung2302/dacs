@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết tour
                    <small>{{$ct_tour->ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
    
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="admin/ct_tour/edit/{{$ct_tour->id}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Loại Tour</label>
                        <select class="form-control" name="loaitour" id="loaitour">
                            @foreach ($loaitour as $lt)
                                <option 
                                @if ($ct_tour->tour->loaitour->id == $lt->id)
                                    {{"selected"}}
                                @endif
                                value="{{$lt->id}}">{{$lt->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Tour</label>
                        <select class="form-control" name="tour" id="tour">
                            @foreach ($tour as $t)
                                <option 
                                @if ($ct_tour->tour->id == $t->id)
                                    {{"selected"}}
                                @endif
                                value="{{$t->id}}">{{$t->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Phương Tiện</label>
                        <select class="form-control" name="phuongtien" id="phuongtien">
                            @foreach ($phuongtien as $pt)
                                <option 
                                @if ($ct_tour->phuongtien->id == $pt->id)
                                    {{"selected"}}
                                @endif
                                value="{{$pt->id}}">{{$pt->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Tên</label>
                        <input class="form-control" name="ten" placeholder="Nhập tên..." value="{{$ct_tour->ten}}" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Ngày khởi hành</label>
                        <input class="form-control" name="ngaykhoihanh" placeholder="..." value="{{$ct_tour->ngaykhoihanh}}"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Điểm khởi hành</label>
                        <input class="form-control" name="diemkhoihanh" placeholder="..." value="{{$ct_tour->diemkhoihanh}}"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Thời gian đi</label>
                        <input class="form-control" name="thoigiandi" placeholder="..." value="{{$ct_tour->thoigiandi}}"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Giá tiền</label>
                        <input class="form-control" name="giatien" placeholder="..." value="{{$ct_tour->giatien}}"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <label>Khuyến Mãi</label>
                        <select class="form-control" name="khuyenmai" id="khuyenmai">
                            @foreach ($khuyenmai as $km)
                                <option 
                                @if ($ct_tour->khuyenmai->id == $km->id)
                                    {{"selected"}}
                                @endif
                                value="{{$km->id}}">{{$km->giamgia}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="noidung" class="form-control ckeditor" id="demo" rows="3">
                            {{$ct_tour->noidung}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p>
                            <img width="300px" src="upload/ct_tour/{{$ct_tour->hinhanh}}" alt="">
                        </p>
                        <input type="file" name="hinhanh" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#loaitour").change(function(){
                var idloaitour = $(this).val();
                $.get("admin/ajax/tour/"+idloaitour,function(data){
                    $("#tour").html(data);
                });
            });
        });
    </script>
@endsection