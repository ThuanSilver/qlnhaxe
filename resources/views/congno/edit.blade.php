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
                        <option value="{{ $khachhang->id }}">{{ $khachhang->Hovaten }}</option>
                    @endforeach
                </select>
                <label for="ngaymua">Ngày mua</label>
                <input type="date" class="form-control" id="ngaymua" name="ngaymua" value="{{$congno->ngaymua}}" >
                <label for="giaban">Giá bán</label>
                <input type="text" class="form-control" id="giaban" name="giaban" value="{{$congno->giaban}}" >
                <label for="tratruoc">Trả trước</label>
                <input type="text" class="form-control" id="tratruoc" name="tratruoc" value="{{$congno->tratruoc}}" >
                <label for="Tralan_1">Trả lần 1</label>
                <input type="text" class="form-control" id="Tralan_1" name="tralan1" value="{{$congno->tralan1}}" >
            </div>
            <div class=" col-sm-6">
                <div class="form-group">
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
                    <label for="tientra">Tiền trả</label>
                    <input type="text" class="form-control" id="tientra" name="tientra" value="{{$congno->tientra}}" >
                    <label for="ngaytra">Ngày trả</label>
                    <input type="date" class="form-control" id="ngaytra" name="ngaytra" value="{{$congno->ngaytra}}" >
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
