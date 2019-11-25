@extends('khachhang.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết khách hàng </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('khachhang.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>họ và tên:</strong>
                {{ $khachhang->Hovaten }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ngày sinh:</strong>
                {{ $khachhang->ngáyinh }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số điện thoại:</strong>
                {{ $khachhang->sdt }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>địa chỉ :</strong>
                {{ $khachhang->diachi }}
            </div>
        </div>

    </div>
@endsection
