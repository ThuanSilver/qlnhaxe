@extends('congno.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin công nợ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('congno.index') }}"> Back</a>
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

    <form action="{{ route('congno.update',$congno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <!-- div congno-->
            <div class="col-sm-6">
                <label for="ten_kh">Tên khách hàng</label>
                <select class="form-control" id="ten_kh" name="khachhang_id">
                    @foreach($khachhangs as $khachhang)
                        @if($congno->khachhang->id == $khachhang->id)
                            {{ 'selected' }}
                        @endif
                        <option value="{{ $khachhang->id }}">{{ $khachhang->name }}</option>
                    @endforeach
                </select>

                <label for="giaban">Giá bán</label>
                <input type="text" class="form-control"  name="giaban" id="n1" value="{{$congno->giaban}}">
                <label for="giaban">Ngày mua</label>
                <input type="date" class="form-control"  name="ngaymua"  value="{{$congno->ngaymua}}">
                <label for="tratruoc">Trả trước</label>
                <input type="text" class="form-control"  name="tratruoc" id="n2" value="{{$congno->tratruoc}} ">
                <label for="Tralan_1">Trả lần 1</label>
                <input type="text" class="form-control"  name="tralan1" id="n3" value="{{$congno->tralan1}}">
                <label for="ngaytra">Ngày trả lần 1</label>
                <input type="date" class="form-control"  name="date1"value="{{$congno->date1}} ">
                <label for="Tralan_1">Trả lần 2</label>
                <input type="text" class="form-control"  name="tralan2" id="n4" value="{{$congno->tralan2}}">
            </div>
            <div class=" col-sm-6">
                <div class="form-group">
                        <label for="ngaytra">Ngày trả lần 2</label>
                        <input type="date" class="form-control"  name="date2" value="{{$congno->date2}}" >
                    <label for="conlai">Còn lại</label>
                    <input type="text" class="form-control" id="conlai" name="conlai" value="{{$congno->conlai}}" >
                    <label for="tenxe">Tên xe</label>
                    <select class="form-control" id="ten_kh" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($congno->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->tenxe }}</option>
                        @endforeach
                    </select>
                    <label for="somay">Số khung</label>
                    <select class="form-control" id="ten_kh" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($congno->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}</option>
                        @endforeach
                    </select>
                    <label for="somay">Số máy</label>
                    <select class="form-control" id="ten_kh" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($congno->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                        @endforeach
                    </select>
                    <label for="tientra" onclick="calc()">Tiền nợ</label>
                        <input type="text" class="form-control"  name="tienno" id="tienno" value="{{$congno->tienno}}" >

                </div>
            </div>

            </div>
            <!-- end congno-->


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
@section('custom_js')
    <script src="{{ asset('js/select2/select2.min.js') }}" defer></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#nameid').select2();
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
