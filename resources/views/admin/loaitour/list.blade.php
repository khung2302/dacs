@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Tour
                    <small>Danh Sách</small>
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
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loaitour as $lt)
                    <tr class="odd gradeX" align="center">
                        <td>{{$lt->id}}</td>
                        <td>{{$lt->ten}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitour/delete/{{$lt->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitour/edit/{{$lt->id}}">Edit</a></td>
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