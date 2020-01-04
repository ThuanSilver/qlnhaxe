@extends('congno.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">nhập công nợ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('congno.index') }}"> Back</a>
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

    <form action="{{ route('congno.store') }}" method="POST">
        @csrf

        <div class="row">

            <!-- div congno-->

                <div class="col-sm-6">
                    <label for="ten_kh">Tên khách hàng</label>
                    <select class="form-control"  name="khachhang_id" id="name">
                        @foreach($khachhangs as $khachhang)
                            <option value="{{ $khachhang->id }}">{{ $khachhang->name }}</option>
                        @endforeach
                    </select>
                    <label for="ngaymua">Ngày mua</label>
                    <input type="date" class="form-control"  name="ngaymua" >
                    <label for="giaban">Giá bán</label>
                    <input type="text" class="form-control"  name="giaban" id="n1">
                    <label for="tratruoc">Trả trước</label>
                    <input type="text" class="form-control"  name="tratruoc" id="n2" >
                    <label for="Tralan_1">Trả lần 1</label>
                    <input type="text" class="form-control"  name="tralan1" id="n3" >
                    <label for="ngaytra">Ngày trả lần 1</label>
                    <input type="date" class="form-control"  name="date1" >
                    <label for="Tralan_1">Trả lần 2</label>
                    <input type="text" class="form-control"  name="tralan2" id="n4">

                </div>
                <div class=" col-sm-6">
                    <label for="ngaytra">Ngày trả lần 2</label>
                    <input type="date" class="form-control"  name="date2" >
                    <div class="form-group">
                        <label for="conlai" onclick="calc()">Còn lại</label>
                        <input type="text" class="form-control"  name="conlai" id="kq" >
                        <label for="tenxe">Tên xe</label>
                        <select class="form-control"  name="thongtinxe_id" id="tenxe">
                            @foreach($thongtinxes as $thongtinxe)
                                <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->tenxe }}</option>
                            @endforeach
                        </select>
                        <label for="somay">Số khung</label>
                        <select class="form-control"  name="thongtinxe_id" id="sokhung">
                            @foreach($thongtinxes as $thongtinxe)
                                <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}</option>
                            @endforeach
                        </select>
                        <label for="somay">Số máy</label>
                        <select class="form-control"  name="thongtinxe_id" id="somay">
                            @foreach($thongtinxes as $thongtinxe)
                                <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                            @endforeach
                        </select>
                        <label for="tienno" onclick="calc()">Tiền nợ</label>
                        <input type="text" class="form-control"  name="tienno" id="tienno" >

                    </div>
                </div>


            <!-- end congno-->


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>

        </div>
        </div>
    </form>
@endsection
@section('custom_js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#name").chosen();
            $("#tenxe").chosen();
            $("#sokhung").chosen();
            $("#somay").chosen();
        })
    </script>
    <script>

        function calc()
        {
            var n1 = parseFloat(document.getElementById('n1').value);
            var n2 = parseFloat(document.getElementById('n2').value);
            var n3 = parseFloat(document.getElementById('n3').value);
            var n4 = parseFloat(document.getElementById('n4').value);

           var kq= document.getElementById('kq').value = n1-n2;
            document.getElementById('tienno').value=kq-n3-n4;
        }

    </script>

@endsection
