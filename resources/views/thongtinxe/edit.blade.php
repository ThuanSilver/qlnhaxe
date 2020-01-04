@extends('thongtinxe.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">kho hàng</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('thongtinxe.index') }}"> Back</a>
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

    <form action="{{ route('thongtinxe.update',$thongtinxe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>loại xe:</strong>
                    <input type="text" name="loaixe" value="{{ $thongtinxe->loaixe }}" class="form-control" placeholder="loại xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>tên xe:</strong>
                    <input type="text" name="tenxe" value="{{ $thongtinxe->tenxe }}" class="form-control" placeholder="tên xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>đời xe:</strong>
                    <input type="text" name="doixe" value="{{ $thongtinxe->doixe }}" class="form-control" placeholder="đời xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>số khung:</strong>
                    <input type="text" name="sokhung" value="{{ $thongtinxe->sokhung }}" class="form-control" placeholder="số khung">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>số máy:</strong>
                    <input type="text" name="somay" value="{{ $thongtinxe->somay }}" class="form-control" placeholder="số máy ">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>mẫu xe:</strong>
                    <input type="text" name="mauxe" value="{{ $thongtinxe->mauxe }}" class="form-control" placeholder="mẫu xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dòng xe:</strong>
                    <input type="text" name="dongxe" value="{{ $thongtinxe->dongxe }}" class="form-control" placeholder="dòng xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nhà cung cấp:</strong>
                    <input type="text" name="nhacc" value="{{ $thongtinxe->nhacc }}" class="form-control" placeholder="nhà cung cấp">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ngày quét bảo hành:</strong>
                    <input type="text" name="ngayquet" value="{{ $thongtinxe->ngayquet }}" class="form-control" placeholder="ngày quét bảo hành">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kho nhận:</strong>
                    <input type="text" name="khonhan" value="{{ $thongtinxe->khonhan }}" class="form-control" placeholder="ngày quét bảo hành">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kho cuối:</strong>
                    <input type="text" name="khocuoi" value="{{ $thongtinxe->khocuoi }}" class="form-control" placeholder="ngày quét bảo hành">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
