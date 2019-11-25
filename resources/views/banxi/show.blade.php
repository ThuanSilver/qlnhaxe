@extends('banxi.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết khách hàng </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banxi.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số máy:</strong>
                {{ $banxi->thongtinxe->somay }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số khung:</strong>
                {{ $banxi->thongtinxe->sokhung }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>loại xe:</strong>
                {{ $banxi->thongtinxe->loaixe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>đời xe :</strong>
                {{ $banxi->thongtinxe->doixe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>màu xe :</strong>
                {{ $banxi->thongtinxe->mauxe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nhà cung cấp :</strong>
                {{ $banxi->nhacc }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>giá nhập :</strong>
                {{ $banxi->gianhap }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>kho xuất :</strong>
                {{ $banxi->kho->dia_diem }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tình trạng :</strong>
                {{ $banxi->tinhtrang }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>giá bán :</strong>
                {{ $banxi->giaban }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nơi xuất :</strong>
                {{ $banxi->noixuat }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ngày xuất :</strong>
                {{ $banxi->ngayxuat }}
            </div>
        </div>
    </div>
@endsection
