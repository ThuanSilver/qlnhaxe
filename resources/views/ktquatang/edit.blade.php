@extends('ktquatang.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin công nợ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('ktquatang.index') }}"> Back</a>
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

    <form action="{{ route('ktquatang.update',$ktquatang->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">

            <!-- div KT_quatang-->
            <div class="col-sm-3"></div>
            <div class=" col-sm-6">
                <div class="form-group">
                    <label for="ten_kh">Tên khách hàng</label>
                    <select class="form-control"  name="khachhang_id" id="name">
                        @foreach($khachhangs as $khachhang)
                            @if($ktquatang->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->name }}</option>
                        @endforeach
                    </select>
                    <label for="ngaymua" class="ngaymua">Ngày nhận</label>
                    <input type="date" class="form-control"  name="date" value="{{$ktquatang->date}}" >
                    <label for="somay">Số máy</label>
                    <select class="form-control"  name="thongtinxe_id" id="somay">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($ktquatang->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                        @endforeach
                    </select>
                    <label for="ngaysinh">Ngày sinh</label>
                    <select class="form-control"  name="khachhang_id" id="ngaysinh">
                        @foreach($khachhangs as $khachhang)
                            @if($ktquatang->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->ngaysinh }}</option>
                        @endforeach
                    </select>

                    <label for="ngaysinh">Mũ Bảo hiểm</label>
                    <select class="form-control"  name="banxe_id" id="muabh">
                        @foreach($banxes as $banxe)
                            @if($ktquatang->banxe->id == $banxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $banxe->id }}">{{ $banxe->muabh }}</option>
                        @endforeach
                    </select>
                    <label for="ngaysinh">Áo mưa</label>
                    <select class="form-control"  name="banxe_id" id="aomua">
                        @foreach($banxes as $banxe)
                            @if($ktquatang->banxe->id == $banxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $banxe->id }}">{{ $banxe->aomua }}</option>
                        @endforeach
                    </select>
                    <label for="ngaysinh">Móc khóa</label>
                    <select class="form-control"  name="banxe_id" id="mockhoa">
                        @foreach($banxes as $banxe)
                            @if($ktquatang->banxe->id == $banxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $banxe->id }}">{{ $banxe->mockhoa }}</option>
                        @endforeach
                    </select>
                    <label for="ngaysinh">Áo trùm xe</label>
                    <select class="form-control"  name="banxe_id" id="aotrumxe">
                        @foreach($banxes as $banxe)
                            @if($ktquatang->banxe->id == $banxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $banxe->id }}">{{ $banxe->aotrumxe }}</option>
                        @endforeach
                    </select>
                    <label for="ngaysinh">BaLo</label>
                    <select class="form-control"  name="banxe_id" id="balo">
                        @foreach($banxes as $banxe)
                            @if($ktquatang->banxe->id == $banxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $banxe->id }}">{{ $banxe->balo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
