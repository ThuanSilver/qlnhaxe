@extends('khachhang.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin khách hàng</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('khachhang.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('khachhang.update',$khachhang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>họ và tên:</strong>
                    <input type="text" name="name" value="{{ $khachhang->name }}" class="form-control" placeholder="họ và tên">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ngày sinh:</strong>
                    <input type="text" name="ngaysinh" value="{{ $khachhang->ngaysinh }}" class="form-control" placeholder="ngày sinh">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>số điện thoại:</strong>
                    <input type="text" name="sdt" value="{{ $khachhang->sdt }}" class="form-control" placeholder="số điện thoại">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>địa chỉ:</strong>
                    <input type="text" name="diachi" value="{{ $khachhang->phuong }}" class="form-control" placeholder="địa chỉ">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>phường:</strong>
                    <input type="text" name="phuong" value="{{ $khachhang->diachi }}" class="form-control" placeholder="địa chỉ">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>thành phố:</strong>
                    <input type="text" name="thanhpho" value="{{ $khachhang->thanhpho }}" class="form-control" placeholder="địa chỉ">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>tỉnh:</strong>
                    <input type="text" name="tinh" value="{{ $khachhang->tinh }}" class="form-control" placeholder="địa chỉ">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
