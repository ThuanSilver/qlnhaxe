@extends('khophukien.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">KHO PHỤ KIỆN</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('khophukien.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('khophukien.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên kho:</strong>
                    <input type="text" name="tenkho" class="form-control" placeholder="Tên kho">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Địa điểm:</strong>
                    <input type="text" name="dia_diem" class="form-control" placeholder="Địa điểm">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="vn_bh">Tên phụ kiện</strong>
                <select class="form-control" id="" name=banphukien_id>
                    @foreach($banphukiens as $banphukien)
                        <option value="{{ $banphukien->id }}">{{ $banphukien->tenphukien }}</option>
                    @endforeach
                </select>
                </input>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="vn_bh"> Số lượng bán</strong>
                <select class="form-control" id="soluongban" name=banphukien_id>
                    @foreach($banphukiens as $banphukien)
                        <option value="{{ $banphukien->id }}">{{ $banphukien->soluong }}</option>
                    @endforeach
                </select>
                </input>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số lượng tồn :</strong>
                    <input type="text" name="soluongton" class="form-control" placeholder="Số lượng tồn" id="soluongton">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nhập:</strong>
                    <input type="text" name="nhap" class="form-control" placeholder="Nhập" id="nhap">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Ngày Nhập:</strong>
                    <input type="date" name="ngaynhap" class="form-control" placeholder="Ngày nhập ">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong onclick="calc()">Còn lại:</strong>
                    <input type="text" name="conlai" id="kq" class="form-control" placeholder="Còn lại">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>
            </div>
        </div>

    </form>
@endsection
@section('custom_js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <script>

        function calc()
        {
            var soluongton = parseFloat(document.getElementById('soluongton').value);
            var nhap = parseFloat(document.getElementById('nhap').value);
            var soluongban = parseFloat(document.getElementById('soluongban').value);
             document.getElementById('kq').value = soluongton+nhap-soluongban;

        }

    </script>
@endsection
