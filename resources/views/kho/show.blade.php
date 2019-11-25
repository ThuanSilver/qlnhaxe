@extends('kho.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết khách hàng </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('kho.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>địa điểm:</strong>
                {{ $kho->dia_diem }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tên kho :</strong>
                {{ $kho->name }}
            </div>
        </div>

    </div>
@endsection
