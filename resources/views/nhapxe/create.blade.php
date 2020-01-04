@extends('nhapxe.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">nhập xe</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('nhapxe.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nhapxe.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- div nhapxe-->

                <div class="col-6 col-sm-6">
                    <div class="form-group">
                        <label for="loaixe">Loại xe</label>
                        <input type="text" class="form-control" name="loaixe" placeholder="loại xe">
                        <label for="tenxe">Tên xe</label>
                        <input type="text" class="form-control" name="tenxe" placeholder="tên xe">
                        <label for="doixe">Đời xe</label>
                        <input type="text" class="form-control" name="doixe" placeholder="đời xe">
                        <label for="mauxe">Mẫu xe</label>
                        <input type="text" class="form-control" name="mauxe" placeholder="mẫu xe">

                        <label for="mauxe">số khung</label>
                        <input type="text" class="form-control" name="sokhung" placeholder="số khung">

                        <label for="mauxe">số máy</label>
                        <input type="text" class="form-control" name="somay" placeholder="số máy">

                        <label for="nhacungcap">Nhà cung cấp</label>
                        <input type="text" class="form-control"  name="nhacc" placeholder="nhà cung cấp">
                        <label for="nhacungcap">Đăng kiểm</label>
                        <input type="text" class="form-control"  name="dangkiem" placeholder="đăng kiểm">
                    </div>
                </div>
                <div class="col-6 col-sm-6">
                    <div class="form-group" >
                        <label for="nhacungcap">Ngày nhận</label>
                        <input type="date" class="form-control" name="ngaynhan" >
                        <label for="nguoinhan">Người nhận</label>
                        <input type="text" class="form-control" name="nguoinhan" placeholder="người nhận">
                        <label for="nguoi_tk">Người TK</label>
                        <input type="text" class="form-control" name="" placeholder="người kiểm tra">
                        <label for="khonhan">Kho nhận</label>
                        <input type="text" class="form-control" name="khonhan" placeholder="kho nhận">
                        <label for="somay">Mã HD</label>
                        <input type="text" class="form-control" name="mahd" placeholder="mã HD">
                        <label for="somay">Ngày HD</label>
                        <input type="date" class="form-control" name="ngayhd" placeholder="ngày HD">
                        <label for="somay">Mã ID</label>
                        <input type="text" class="form-control" name="maID" placeholder="Mã ID">
                        <label for="somay">Giá nhập</label>
                        <input type="text" class="form-control" name="gianhap"placeholder="giá nhập" >
                    </div>


            </div>
            <!-- end nhapxe-->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>


            </div>
        </div>

    </form>
@endsection
