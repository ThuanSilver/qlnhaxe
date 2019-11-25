@extends('banxe.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin công nợ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banxe.index') }}"> Back</a>
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

    <form action="{{ route('banxe.update',$banxe->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- div nhapxe-->

            <div class=" col-sm-6">
                <div class="form-group">
                    <label for="hoten">Họ và Tên</label>
                    <input type="text" class="form-control" id="hoten" name="name" value="{{$banxe->name}}" >
                    <label for="ngaysinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" value="{{$banxe->ngaysinh}}"  >
                    <label for="sodt">Số điện thoại</label>
                    <input type="text" class="form-control"  name="sdt" value="{{$banxe->sdt}}" >
                    <label for="date">Ngày mua</label>
                    <input type="text" class="form-control" id="ngaymua" name="ngaymua" value="{{$banxe->ngaymua}}" >
                    <label for="diachi">Đỉa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" value="{{$banxe->diachi}}"  >
                    <label for="phuong">Phường</label>
                    <input type="text" class="form-control" id="phuong" name="phuong" value="{{$banxe->phuong}}" >
                    <label for="thanhpho">Thành Phố</label>
                    <input type="text" class="form-control" id="thanhpho" name="thanhpho" value="{{$banxe->thanhpho}}" >
                    <label for="tinh">Tỉnh</label>
                    <input type="text" class="form-control" id="tinh" name="tinh" value="{{$banxe->tinh}}" >
                    <label for="somay">Số máy</label>
                    <select class="form-control" id="somay" name="somay">
                        @foreach($thongtinxes as $thongtinxe)
                            <option
                                @if($banxe->thongtinxe->id == $thongtinxe->id)
                                      {{ 'selected' }}
                                      @endif
                                value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}
                            </option>
                        @endforeach
                    </select>
                    <label for="somay">quà tặng</label>
                    <select class="form-control" id="somay" name="quatang_id">
                        @foreach($quatangs as $quatang)
                            <option
                                @if($banxe->quatang->id == $quatang->id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $quatang->id }}">{{ $quatang->tenquatang }}
                            </option>
                        @endforeach
                    </select>


                </div>
            </div>
            <div class=" col-sm-6">
                <div class="form-group" >
                    <label for="tenxe">Tên xe</label>
                    <select class="form-control" id="somay" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            <option   @if($banxe->thongtinxe->id == $thongtinxe->id)
                                      {{ 'selected' }}
                                      @endif
                                value="{{ $thongtinxe->id }}">{{ $thongtinxe->tenxe }}</option>
                        @endforeach
                    </select>
                    <label for="mauxe">Màu xe</label>
                    <select class="form-control" id="somay" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            <option   @if($banxe->thongtinxe->id == $thongtinxe->id)
                                      {{ 'selected' }}
                                      @endif
                                value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}</option>
                        @endforeach
                    </select>
                   <label for="somay">kho </label>
                    <select class="form-control" id="somay" name="kho_id">
                        @foreach($khos as $kho)
                            <option   @if($banxe->kho->id == $kho->id)
                                      {{ 'selected' }}
                                      @endif
                                value="{{ $kho->id }}">{{ $kho->dia_diem }}</option>
                        @endforeach
                    </select>
                    <label for="tinhtrang">Tình trạng </label>
                    <input type="text" class="form-control" id="tinhtrang" name="tinhtrang" value="{{$banxe->tinhtrang}}" >
                    <label for="giaban">Giá bán</label>
                    <input type="text" class="form-control" id="giaban" name="giaban" value="{{$banxe->giaban}}" >
                    <label for="gop">Góp</label>
                    <select class="form-control" id="gop" name="tragop_id" >
                        @foreach($tragops as $tragop)
                            <option   @if($banxe->tragop->id == $tragop->id)
                                      {{ 'selected' }}
                                      @endif
                                value="{{ $tragop->id }}">{{ $tragop->loaitragop }}</option>
                        @endforeach
                    </select>
                    <label for="duatruoc">Đưa trước</label>
                    <input type="text" class="form-control" id="duatruoc" name="duatruoc" value="{{$banxe->duatruoc}}" >
                    <label for="conlai">Còn lại</label>
                    <input type="text" class="form-control" id="conlai" name="conlai" value="{{$banxe->conlai}}" >
                    <label for="vn_bh">NV BH</label>
                    <select class="form-control" id="somay" name=nhanvien_id>
                        @foreach($nhanviens as $nhanvien)
                            <option   @if($banxe->nhanvien->id == $nhanvien->id)
                                      {{ 'selected' }}
                                      @endif
                                value="{{ $nhanvien->id }}">{{ $nhanvien->nhanvienbh }}</option>
                        @endforeach
                    </select>
                    </select>
                    <label for="sokhung">Số khung</label>
                    <select class="form-control" id="somay" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            <option    @if($banxe->thongtinxe->id == $thongtinxe->id)
                                       {{ 'selected' }}
                                       @endif
                                value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <!-- end nhapxe-->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
