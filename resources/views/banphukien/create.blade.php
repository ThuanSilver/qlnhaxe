@extends('banphukien.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">BÁN PHỤ KIỆN</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banphukien.index') }}"> Back</a>
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

    <form action="{{ route('banphukien.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ngày bán:</strong>
                    <input type="date" name="ngayban" class="form-control" placeholder="Ngày bán">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số máy:</strong>
                    <select name="somay">
                        <option>Số máy</option>
                        <option>Bán lẻ</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên phụ kiện:</strong>
                    <input type="text" name="tenphukien" class="form-control" placeholder="Tên phụ kiện">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số lượng:</strong>
                    <input type="text" name="soluong" class="form-control" placeholder="Số lượng" id="soluong">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá:</strong>
                    <input type="text" name="gia" class="form-control" placeholder="Giá" id="gia">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong onclick="calc()">Tổng tiền:</strong>
                    <input type="text" name="tongtien" id="kq" class="form-control" placeholder="Tổng tiền">
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
            var soluong = parseFloat(document.getElementById('soluong').value);
            var gia = parseFloat(document.getElementById('gia').value);
             document.getElementById('kq').value = soluong*gia;

        }

    </script>
@endsection
