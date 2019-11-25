@extends('nhanvien.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết nhân viên </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('nhanvien.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>người nhận:</strong>
                {{ $nhanvien->nguoinhan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>người kiểm tra:</strong>
                {{ $nhanvien->nguoikt }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nhân viên bảo hiểm:</strong>
                {{ $nhanvien->nhanvienbh }}
            </div>
        </div>


    </div>
@endsection
