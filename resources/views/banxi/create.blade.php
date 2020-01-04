@extends('banxi.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">bán sỉ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banxi.index') }}"> Back</a>
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

    <form action="{{ route('banxi.store') }}" method="POST">
        @csrf

        <div class="row">
            <!-- div xuat noi bo-->
            <div class="col-sm-6">

                <label for="somay">Số máy</label>
                <select class="form-control" name="thongtinxe_id" id="nameid">
                    @foreach($thongtinxes as $thongtinxe)
                        <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                    @endforeach
                </select>
                <label for="sokhung">Số khung</label>
                <select class="form-control" name="thongtinxe_id" id="nameid">
                    @foreach($thongtinxes as $thongtinxe)
                        <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}</option>
                    @endforeach
                </select>
                <label for="loaixe">Loại xe</label>
                <select class="form-control"  name="thongtinxe_id" id="nameid">
                    @foreach($thongtinxes as $thongtinxe)
                        <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->loaixe }}</option>
                    @endforeach
                </select>
                <label for="mauxe">Màu xe</label>
                <select class="form-control" name="thongtinxe_id" id="nameid">
                    @foreach($thongtinxes as $thongtinxe)
                        <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}</option>
                    @endforeach
                </select>
                <label for="doixe">Đời xe</label>
                <select class="form-control" name="thongtinxe_id" id="nameid">
                    @foreach($thongtinxes as $thongtinxe)
                        <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->doixe }}</option>
                    @endforeach
                </select>
                <label for="nhacungcap">Nhà cung cấp</label>
                <input type="text" class="form-control"  name="nhacc" >
            </div>
            <div class=" col-sm-6">
                <div class="form-group">

                    <label for="gianhap">Giá nhập</label>
                    <input type="text" class="form-control"  name="gianhap" >
                    <label for="khoxuat">Kho xuất</label>
                    <select class="form-control" name="kho_id" id="nameid">
                        @foreach($khos as $kho)
                            <option value="{{ $kho->id }}">{{ $kho->dia_diem }}</option>
                        @endforeach
                    </select>
                    <label for="tinhtrang">Tình trạng</label>
                    <input type="text" class="form-control"  name="tinhtrang" >

                    <label for="giaban">Giá bán</label>
                    <input type="text" class="form-control"  name="giaban" >
                    <label for="noixuat">Nơi xuất</label>
                    <input type="text" class="form-control"  name="noixuat" >
                    <label for="ngayxuat">Ngày xuất</label>
                    <input type="date" class="form-control"  name="ngayxuat" >
                </div>


            </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>
            </div>


    </form>
@endsection
@section('custom_js')
    <script src="{{ asset('js/select2/select2.min.js') }}" defer></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#nameid').select2();
        });
    </script>


@endsection
