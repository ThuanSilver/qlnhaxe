@extends('nhapxe.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết nhập xe </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('nhapxe.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>loại xe :</strong>
                {{ $nhapxe->thongtinxe->loaixe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tên xe :</strong>
                {{ $nhapxe->thongtinxe->tenxe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>đời xe :</strong>
                {{ $nhapxe->thongtinxe->doixe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mẫu xe :</strong>
                {{ $nhapxe->thongtinxe->mauxe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số khung :</strong>
                {{ $nhapxe->thongtinxe->sokhung }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số máy :</strong>
                {{ $nhapxe->thongtinxe->somay }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nhà cung cấp :</strong>
                {{ $nhapxe->nhacc}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>người nhận :</strong>
                {{ $nhapxe->nhanvien->nguoinhan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>người kiểm tra :</strong>
                {{ $nhapxe->nhanvien->nguoikt }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mã HD:</strong>
                {{ $nhapxe->mahd }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ngày hợp đồng:</strong>
                {{ $nhapxe->ngayhd }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mã ID:</strong>
                {{ $nhapxe->maID }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>giá nhập:</strong>
                {{ $nhapxe->gianhap }}
            </div>
        </div>



    </div>
@endsection
