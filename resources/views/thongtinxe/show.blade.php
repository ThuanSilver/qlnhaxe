@extends('thongtinxe.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết xe </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('thongtinxe.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>loại xe:</strong>
                {{ $thongtinxe->loaixe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tên xe:</strong>
                {{ $thongtinxe->tenxe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>đời xe:</strong>
                {{ $thongtinxe->doixe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mẫu xe:</strong>
                {{ $thongtinxe->mauxe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số khung:</strong>
                {{ $thongtinxe->sokhung }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số máy:</strong>
                {{ $thongtinxe->somay }}
            </div>
        </div>
    </div>
@endsection
