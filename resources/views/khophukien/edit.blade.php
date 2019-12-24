@extends('khophukien.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Sửa thông tin kho phụ kiện</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('khophukien.index') }}"> Back</a>
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

    <form action="{{ route('khophukien.update',$khophukien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên kho:</strong>
                    <input type="text" name="tenkho" class="form-control" placeholder="Tên kho" value="{{$khophukien->tenkho}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Địa điểm:</strong>
                    <input type="text" name="dia_diem" class="form-control" placeholder="Địa điểm" value="{{$khophukien->dia_diem}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="vn_bh">Tên phụ kiện</label>
                <select class="form-control" id="" name=banphukien_id>
                    @foreach($banphukiens as $banphukien)
                        @if($khophukien->banphukien->id == $banphukien->id)
                            {{ 'selected' }}
                        @endif
                        <option value="{{ $banphukien->id }}">{{ $banphukien->tenphukien }}</option>
                    @endforeach
                </select>
                </input>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="vn_bh"> Số lượng bán</label>
                <select class="form-control" id="soluong" name=banphukien_id>
                    @foreach($banphukiens as $banphukien)
                        @if($khophukien->banphukien->id == $banphukien->id)
                            {{ 'selected' }}
                        @endif
                        <option value="{{ $banphukien->id }}">{{ $banphukien->soluong }}</option>
                    @endforeach
                </select>
                </input>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số lượng tồn :</strong>
                    <input type="text" name="soluongton" class="form-control" placeholder="Số lượng tồn" id="soluongton" value="{{$khophukien->soluongton}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nhập:</strong>
                    <input type="text" name="nhap" class="form-control" placeholder="Nhập" id="nhap" value="{{$khophukien->nhap}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Ngày Nhập:</strong>
                    <input type="date" name="ngaynhap" class="form-control" placeholder="Ngày nhập " value="{{$khophukien->ngaynhap}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong onclick="calc()">Còn lại:</strong>
                    <input type="text" name="conlai" id="kq" class="form-control" placeholder="Tổng tiền" value="{{$khophukien->conlai}}">
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
