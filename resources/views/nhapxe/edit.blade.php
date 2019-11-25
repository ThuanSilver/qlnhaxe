@extends('nhapxe.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin công nợ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('nhapxe.index') }}"> Back</a>
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

    <form action="{{ route('nhapxe.update',$nhapxe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- div nhapxe-->

                <div class="col-6 col-sm-6">
                    <div class="form-group">
                        <label for="loaixe">Loại xe</label>
                        <select class="form-control"  name="thongtinxe_id">
                            @foreach($thongtinxes as $thongtinxe)
                                <option
                                    @if($nhapxe->thongtinxe->id == $thongtinxe->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $thongtinxe->id }}">{{ $thongtinxe->loaixe }}</option>
                            @endforeach
                        </select>
                        <label for="tenxe">Tên xe</label>
                        <select class="form-control"  name="thongtinxe_id">
                            @foreach($thongtinxes as $thongtinxe)
                                <option
                                    @if($nhapxe->thongtinxe->id == $thongtinxe->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $thongtinxe->id }}">{{ $thongtinxe->tenxe }}</option>
                            @endforeach
                        </select>
                        <label for="doixe">Đời xe</label>
                        <select class="form-control"  name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            <option
                                @if($nhapxe->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $thongtinxe->id }}">{{ $thongtinxe->doixe }}</option>
                        @endforeach
                            </select>
                        <label for="mauxe">Mẫu xe</label>
                        <select class="form-control"  name="thongtinxe_id">
                            @foreach($thongtinxes as $thongtinxe)
                                <option
                                    @if($nhapxe->thongtinxe->id == $thongtinxe->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}</option>
                            @endforeach
                        </select>
                        <label for="mauxe">số khung</label>
                        <select class="form-control" name="thongtinxe_id">
                            @foreach($thongtinxes as $thongtinxe)
                                <option
                                    @if($nhapxe->thongtinxe->id == $thongtinxe->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}</option>
                            @endforeach
                        </select>
                        <label for="mauxe">số máy</label>
                        <select class="form-control" name="thongtinxe_id">
                            @foreach($thongtinxes as $thongtinxe)
                                <option
                                    @if($nhapxe->thongtinxe->id == $thongtinxe->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                            @endforeach
                        </select>
                        <label for="nhacungcap">Nhà cung cấp</label>
                        <input type="text" class="form-control" id="nhacungcap" name="nhacc" value="{{ $nhapxe->nhacc }}">
                    </div>
                </div>
                <div class="col-6 col-sm-6">
                    <div class="form-group" >
                        <label for="nhacungcap">Ngày nhận</label>
                        <input type="date" class="form-control" name="ngaynhan"value="{{ $nhapxe->ngaynhan }}" >
                        <label for="nguoinhan">Người nhận</label>
                        <select class="form-control" name="nhanvien_id">
                            @foreach($nhanviens as $nhanvien)
                                <option
                                    @if($nhapxe->nhanvien->id == $nhanvien->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $nhanvien->id }}">{{ $nhanvien->nguoinhan }}</option>
                            @endforeach
                        </select>
                        <label for="nguoi_tk">Người kiểm tra</label>
                        <select class="form-control" name="nhanvien_id">
                            @foreach($nhanviens as $nhanvien)
                                <option
                                    @if($nhapxe->nhanvien->id == $nhapxe->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $nhanvien->id}}">{{ $nhanvien->nguoikt }}</option>
                            @endforeach
                        </select>
                        <label for="khonhan">Kho nhận</label>
                        <select class="form-control" name="kho_id">
                            @foreach($khos as $kho)

                                <option
                                    @if($nhapxe->kho->id == $kho->id)
                                    {{ 'selected' }}
                                    @endif
                                    value="{{ $kho->id }}">{{ $kho->dia_diem }}</option>
                            @endforeach
                        </select>
                        <label for="somay">Mã HD</label>
                        <input type="text" class="form-control" id="ma_hd"name="mahd" placeholder="mã HD"value="{{ $nhapxe->mahd }}">
                        <label for="somay">Ngày HD</label>
                        <input type="date" class="form-control" id="ngay_hd"name="ngayhd" placeholder="ngày HD"value="{{ $nhapxe->ngayhd }}">
                        <label for="somay">Mã ID</label>
                        <input type="text" class="form-control" id="ma_id"name="maID" placeholder="Mã ID"value="{{ $nhapxe->maID }}">
                        <label for="somay">Giá nhập</label>
                        <input type="text" class="form-control" id="gianhap"name="gianhap"placeholder="giá nhập" value="{{ $nhapxe->gianhap }}">
                    </div>


            </div>
            <!-- end nhapxe-->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
