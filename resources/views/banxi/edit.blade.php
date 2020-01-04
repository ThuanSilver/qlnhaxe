@extends('banxi.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin bán sỉ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banxi.index') }}"> Back</a>
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

    <form action="{{ route('banxi.update',$banxi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- div ktquatang-->
            <div class="col-sm-6">

                <label for="somay">Số máy</label>
                <select class="form-control" name="thongtinxe_id">
                    @foreach($thongtinxes as $thongtinxe)
                        <option
                            @if($banxi->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                    @endforeach
                </select>
                <label for="sokhung">Số khung</label>
                <select class="form-control" name="thongtinxe_id">
                    @foreach($thongtinxes as $thongtinxe)
                        <option   @if($banxi->thongtinxe->id == $thongtinxe->id)
                                  {{ 'selected' }}
                                  @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}</option>
                    @endforeach
                </select>
                <label for="loaixe">Loại xe</label>
                <select class="form-control"  name="thongtinxe_id">
                    @foreach($thongtinxes as $thongtinxe)
                        <option
                            @if($banxi->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->loaixe }}</option>
                    @endforeach
                </select>
                <label for="mauxe">Màu xe</label>
                <select class="form-control" name="thongtinxe_id">
                    @foreach($thongtinxes as $thongtinxe)
                        <option
                            @if($banxi->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}</option>
                    @endforeach
                </select>
                <label for="doixe">Đời xe</label>
                <select class="form-control" name="thongtinxe_id">
                    @foreach($thongtinxes as $thongtinxe)
                        @if($banxi->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                        @endif
                        <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->doixe }}</option>
                    @endforeach
                </select>
                <label for="somay">ngày xuất</label>
                <input type="text" class="form-control" name="ngayxuat" value="{{ $banxi->ngayxuat }}">
            </div>
            <div class=" col-sm-6">
                <div class="form-group">
                    <label for="nhacungcap">Nhà cung cấp</label>
                    <input type="text" class="form-control"  name="nhacc" value="{{$banxi->nhacc}}" >
                    <label for="gianhap">Giá nhập</label>
                    <input type="text" class="form-control"  name="gianhap" value="{{$banxi->gianhap}}" >
                    <label for="khoxuat">Kho xuất</label>
                    <select class="form-control" name="kho_id">
                        @foreach($khos as $kho)
                            <option
                                @if($banxi->kho->id == $kho->id)
                                {{ 'selected' }}
                                @endif
                                value="{{ $kho->id }}">{{ $kho->dia_diem }}</option>
                        @endforeach
                    </select>
                    <label for="somay">tình trạng</label>
                    <input type="text" class="form-control" name="tinhtrang" value="{{ $banxi->tinhtrang }}">
                    <label for="somay">giá bán</label>
                    <input type="text" class="form-control" name="giaban" value="{{ $banxi->giaban }}">
                    <label for="somay">nơi xuất</label>
                    <input type="text" class="form-control" name="noixuat" value="{{ $banxi->noixuat }}">



            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
