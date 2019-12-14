@extends('khachhang.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết khách hàng </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('ktquatang.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>họ và tên:</strong>
                {{ $ktquatang->khachhang->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mũ bh:</strong>
                {{ $ktquatang->banxe->muabh }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Áo mưa:</strong>
                {{ $ktquatang->banxe->aomua }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Móc khóa:</strong>
                {{ $ktquatang->banxe->mockhoa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Áo trùm xe:</strong>
                {{ $ktquatang->banxe->aotrumxe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Balo:</strong>
                {{ $ktquatang->banxe->balo }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ngày nhận:</strong>
                {{ $ktquatang->date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số máy :</strong>
                {{ $ktquatang->thongtinxe->somay }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ngày sinh :</strong>
                {{ $ktquatang->khachhang->ngaysinh }}
            </div>
        </div>
    </div>
@endsection
