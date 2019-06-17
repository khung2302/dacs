@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phương Tiện
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
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
                    @foreach ($phuongtien as $pt)
                        <tr class="odd gradeX" align="center">
                            <td>{{$pt->id}}</td>
                            <td>{{$pt->ten}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/phuongtien/delete/{{$pt->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/phuongtien/edit/{{$pt->id}}">Edit</a></td>
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